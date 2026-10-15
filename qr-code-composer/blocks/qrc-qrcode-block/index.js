( function ( wp ) {
	var registerBlockType = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	var Fragment = wp.element.Fragment;
	var useRef = wp.element.useRef;
	var useEffect = wp.element.useEffect;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var useBlockProps = wp.blockEditor.useBlockProps;
	var PanelBody = wp.components.PanelBody;
	var SelectControl = wp.components.SelectControl;
	var TextControl = wp.components.TextControl;
	var RangeControl = wp.components.RangeControl;
	var ColorPicker = wp.components.ColorPicker;
	var Dropdown = wp.components.Dropdown;
	var Button = wp.components.Button;
	var useSelect = wp.data.useSelect;
	var __ = wp.i18n.__;
	var TD = 'qr-code-composer';

	// Global design settings. `datas` is the same object the front-end qrcode.js uses
	// (localized by the plugin), so the editor preview matches the front-end exactly.
	// It can be printed after this script loads, so it is re-read at render time.
	var globals = {};
	function refreshGlobals() {
		var merged = Object.assign( {}, window.qrcBlockData || {}, window.datas || {} );
		Object.keys( merged ).forEach( function ( key ) {
			globals[ key ] = merged[ key ];
		} );
	}
	refreshGlobals();
	var DEFAULT_OPTION_LABEL = __( 'Default (use admin setting)', TD );

	/* ---------- options ---------- */

	var SOURCE_OPTIONS = [
		{ label: __( 'Current Page Link', TD ), value: 'current' },
		{ label: __( 'Custom Link / Text / Email / Number', TD ), value: 'link' },
		{ label: __( 'Phone Number', TD ), value: 'phone' },
		{ label: __( 'WhatsApp (Pro)', TD ), value: 'whatsapp', disabled: true },
		{ label: __( 'WiFi (Pro)', TD ), value: 'wifi', disabled: true },
		{ label: __( 'Google Maps (Pro)', TD ), value: 'maps', disabled: true },
		{ label: __( 'Event (Pro)', TD ), value: 'event', disabled: true },
		{ label: __( 'vCard (Pro)', TD ), value: 'vcard', disabled: true }
	];
	var FREE_SOURCES = [ 'current', 'link', 'phone' ];

	var SHAPE_OPTIONS = [
		{ label: DEFAULT_OPTION_LABEL, value: '' },
		{ label: __( 'Square', TD ), value: 'square' },
		{ label: __( 'Circle', TD ), value: 'circle' }
	];

	var BODY_STYLE_OPTIONS = [
		{ label: DEFAULT_OPTION_LABEL, value: '' },
		{ label: __( 'Square', TD ), value: 'square' },
		{ label: __( 'Dots', TD ), value: 'dots' },
		{ label: __( 'Rounded', TD ), value: 'rounded' },
		{ label: __( 'Extra Rounded', TD ), value: 'extra-rounded' },
		{ label: __( 'Classy', TD ), value: 'classy' },
		{ label: __( 'Classy Rounded', TD ), value: 'classy-rounded' }
	];

	var DOWNLOAD_BTN_OPTIONS = [
		{ label: DEFAULT_OPTION_LABEL, value: '' },
		{ label: __( 'Show', TD ), value: 'no' },
		{ label: __( 'Hide', TD ), value: 'yes' }
	];

	var LABEL_STYLE = { display: 'block', marginBottom: '6px', fontWeight: 500, fontSize: '11px', textTransform: 'uppercase' };

	/* ---------- field helpers ---------- */

	function set( setAttributes, key, value ) {
		var update = {};
		update[ key ] = value;
		setAttributes( update );
	}

	function makeText( attributes, setAttributes, key, label, placeholder ) {
		return el( TextControl, {
			key: key,
			label: label,
			placeholder: placeholder,
			value: attributes[ key ],
			onChange: function ( value ) { set( setAttributes, key, value ); }
		} );
	}

	function makeSelect( attributes, setAttributes, key, label, options ) {
		return el( SelectControl, {
			key: key,
			label: label,
			value: attributes[ key ],
			options: options,
			onChange: function ( value ) { set( setAttributes, key, value ); }
		} );
	}

	function makeRange( attributes, setAttributes, key, label, min, max, step ) {
		var raw = attributes[ key ];
		var numValue = ( raw === '' || raw === undefined || raw === null ) ? undefined : Number( raw );
		return el( RangeControl, {
			key: key,
			label: label,
			min: min,
			max: max,
			step: step || 1,
			allowReset: true,
			value: numValue,
			onChange: function ( value ) {
				set( setAttributes, key, ( value === undefined || value === null ) ? '' : String( value ) );
			}
		} );
	}

	function makeColor( attributes, setAttributes, key, label ) {
		var value = attributes[ key ] || '';

		function handleChange( newColor ) {
			var hex = typeof newColor === 'string' ? newColor : ( newColor && newColor.hex ? newColor.hex : '' );
			set( setAttributes, key, hex );
		}

		return el( 'div', { key: key, className: 'qrc-color-field', style: { marginBottom: '16px' } },
			el( 'label', { style: LABEL_STYLE }, label ),
			el( 'div', { style: { display: 'flex', alignItems: 'center', gap: '8px' } },
				el( Dropdown, {
					renderToggle: function ( args ) {
						return el( Button, {
							onClick: args.onToggle,
							'aria-expanded': args.isOpen,
							style: {
								width: '30px', height: '30px', minWidth: '30px', borderRadius: '4px',
								border: '1px solid #949494', background: value || '#ffffff', padding: 0
							}
						} );
					},
					renderContent: function () {
						return el( ColorPicker, { color: value || undefined, onChange: handleChange, enableAlpha: false } );
					}
				} ),
				el( Button, {
					variant: 'tertiary',
					isSmall: true,
					onClick: function () { set( setAttributes, key, '' ); }
				}, value ? value : __( 'Default', TD ) )
			)
		);
	}

	/* ---------- Pro-locked (disabled) fields ---------- */

	function proBadge() {
		return el( 'span', {
			style: {
				marginLeft: '6px', padding: '1px 6px', borderRadius: '3px', background: '#f59e0b',
				color: '#fff', fontSize: '9px', fontWeight: 700, letterSpacing: '.5px', verticalAlign: 'middle'
			}
		}, 'PRO' );
	}

	// Renders a visible but inert control. Nothing is saved to the block attributes.
	function proLocked( key, label, kind, helpText ) {
		var control;
		if ( kind === 'select' ) {
			control = el( SelectControl, {
				value: '',
				disabled: true,
				options: [ { label: DEFAULT_OPTION_LABEL, value: '' } ],
				onChange: function () {}
			} );
		} else if ( kind === 'color' ) {
			control = el( 'div', { style: { display: 'flex', alignItems: 'center', gap: '8px' } },
				el( Button, { disabled: true, style: { width: '30px', height: '30px', minWidth: '30px', borderRadius: '4px', border: '1px solid #949494', background: '#fff', padding: 0 } } ),
				el( 'span', { style: { fontSize: '12px', color: '#757575' } }, __( 'Default', TD ) )
			);
		} else if ( kind === 'media' ) {
			control = el( Button, { variant: 'secondary', disabled: true }, __( 'Upload Logo', TD ) );
		} else {
			control = el( TextControl, { value: '', disabled: true, placeholder: __( 'Without .png', TD ), onChange: function () {} } );
		}

		return el( 'div', {
			key: key,
			className: 'qrc-pro-locked',
			'aria-disabled': 'true',
			title: __( 'Available in QR Code Composer Pro', TD ),
			style: { marginBottom: '16px', opacity: 0.6, pointerEvents: 'none' }
		},
			el( 'label', { style: LABEL_STYLE }, label, proBadge() ),
			helpText ? el( 'p', { className: 'components-base-control__help', style: { marginTop: 0 } }, helpText ) : null,
			control
		);
	}

	function proUpsell() {
		if ( ! globals.proUrl ) {
			return null;
		}
		return el( 'p', { key: 'pro-upsell', style: { fontSize: '12px', marginTop: '4px' } },
			__( 'Fields marked PRO are available in ', TD ),
			el( 'a', { href: globals.proUrl, target: '_blank', rel: 'noopener noreferrer' }, __( 'QR Code Composer Pro', TD ) ),
			'.'
		);
	}

	/* ---------- panels ---------- */

	function getFieldControls( attributes, setAttributes ) {
		switch ( attributes.sourceType ) {
			case 'link':
				return [ makeText( attributes, setAttributes, 'link', __( 'Text, Number or Link', TD ), __( 'Write Text, Number or Link', TD ) ) ];
			case 'phone':
				return [ makeText( attributes, setAttributes, 'number', __( 'Phone / Mobile Number', TD ), __( 'Input phone or mobile number', TD ) ) ];
			default:
				return [
					el( 'p', { key: 'current-note', style: { color: '#757575' } },
						__( 'No extra fields needed - this automatically generates a QR code for the current page URL.', TD )
					)
				];
		}
	}

	function getDesignControls( attributes, setAttributes ) {
		return [
			makeSelect( attributes, setAttributes, 'shape', __( 'Shape', TD ), SHAPE_OPTIONS ),
			makeRange( attributes, setAttributes, 'size', __( 'Size (px)', TD ), 80, 1000, 10 ),
			makeSelect( attributes, setAttributes, 'bodystyle', __( 'Body Dot Style', TD ), BODY_STYLE_OPTIONS ),
			makeColor( attributes, setAttributes, 'color', __( 'Body Color 1', TD ) ),
			proLocked( 'p-dlcolor', __( 'Body Color 2 (gradient)', TD ), 'color' ),
			proLocked( 'p-eyeframe', __( 'Eye Frame Style', TD ), 'select' ),
			proLocked( 'p-ifcolor', __( 'Eye Frame Color 1', TD ), 'color' ),
			proLocked( 'p-ilcolor', __( 'Eye Frame Color 2 (gradient)', TD ), 'color' ),
			proLocked( 'p-eyeball', __( 'Eye Ball Style', TD ), 'select' ),
			proLocked( 'p-pifcolor', __( 'Eye Ball Color 1', TD ), 'color' ),
			proLocked( 'p-plfcolor', __( 'Eye Ball Color 2 (gradient)', TD ), 'color' ),
			makeColor( attributes, setAttributes, 'background', __( 'Background Color', TD ) ),
			proLocked( 'p-level', __( 'Error Correction Level', TD ), 'select' ),
			makeRange( attributes, setAttributes, 'qrcbround', __( 'Border Corner Radius', TD ), 0, 50, 1 ),
			proLocked( 'p-logo', __( 'Logo', TD ), 'media', __( 'Overrides the default logo from plugin settings for this QR code only.', TD ) ),
			proLocked( 'p-filename', __( 'Download Filename', TD ), 'text' ),
			proUpsell()
		];
	}

	function getButtonControls( attributes, setAttributes ) {
		return [
			makeSelect( attributes, setAttributes, 'dbtn', __( 'Download Button', TD ), DOWNLOAD_BTN_OPTIONS ),
			makeText( attributes, setAttributes, 'label', __( 'Button Label', TD ), __( 'Download', TD ) ),
			makeColor( attributes, setAttributes, 'dbtcolor', __( 'Button Text Color', TD ) ),
			makeColor( attributes, setAttributes, 'dbtbg', __( 'Button Background', TD ) ),
			makeColor( attributes, setAttributes, 'dbborder', __( 'Button Border Color', TD ) ),
			makeRange( attributes, setAttributes, 'brdius', __( 'Button Border Radius', TD ), 0, 50, 1 ),
			makeRange( attributes, setAttributes, 'fntsz', __( 'Button Font Size', TD ), 8, 40, 1 )
		];
	}

	/* ---------- editor preview (drawn in the browser, no server round-trip) ---------- */

	function getQrData( attributes, permalink ) {
		switch ( attributes.sourceType ) {
			case 'link':
				return ( attributes.link || '' ).trim();
			case 'phone':
				var number = ( attributes.number || '' ).replace( /[^0-9+]/g, '' );
				return number ? 'tel:' + number : '';
			case 'current':
				return permalink || globals.siteUrl || '';
			default:
				return '';
		}
	}

	function QrPreview( props ) {
		refreshGlobals();
		var ref = useRef( null );
		var qrRef = useRef( null );
		var a = props.attributes;
		var size = parseInt( a.size, 10 ) || parseInt( globals.size, 10 ) || 200;
		var radius = parseInt( a.qrcbround, 10 ) || 0;
		var deps = [ props.data, size, a.shape, a.bodystyle, a.color, a.background ];

		useEffect( function () {
			var node = ref.current;
			if ( ! node ) {
				return;
			}
			node.innerHTML = '';
			if ( ! props.data || ! window.QRCodeStyling ) {
				return;
			}
			var qr = new window.QRCodeStyling( {
				shape: a.shape || globals.shape || 'square',
				width: size,
				height: size,
				data: props.data,
				margin: parseInt( globals.quiet, 10 ) || 0,
				dotsOptions: {
					type: a.bodystyle || globals.dotstyle || 'square',
					color: a.color || globals.color || '#000000'
				},
				backgroundOptions: {
					color: a.background || globals.background || 'transparent'
				}
			} );
			qr.append( node );
			qrRef.current = qr;
		}, deps );

		// Download button preview (same logic and styling as render.php).
		var showDownload = ( a.dbtn || '' ) === '' ? ( globals.dlHide || 'no' ) === 'no' : a.dbtn === 'no';
		var num = function ( v, fallback ) {
			var n = parseInt( v, 10 );
			return isNaN( n ) ? fallback : n;
		};
		var button = null;
		if ( showDownload ) {
			button = el( 'div', {},
				el( 'button', {
					type: 'button',
					onClick: function () {
						if ( qrRef.current ) {
							qrRef.current.download( { name: 'qr-code', extension: 'png' } );
						}
					},
					style: {
						minWidth: size + 'px',
						background: a.dbtbg || globals.dlBg || '#e8e8e8',
						color: a.dbtcolor || globals.dlColor || '#4c4c4c',
						fontWeight: 600,
						border: '1px solid ' + ( a.dbborder || globals.dlBorder || '#c4c4c4' ),
						borderRadius: num( a.brdius, num( globals.dlRadius, 4 ) ) + 'px',
						fontSize: num( a.fntsz, num( globals.dlFont, 15 ) ) + 'px',
						padding: '6px 0',
						cursor: 'pointer'
					}
				}, a.label || globals.dlText || __( 'Download QR', TD ) )
			);
		}

		return el( 'div', {},
			el( 'div', {
				ref: ref,
				style: { display: 'inline-block', minWidth: '40px', minHeight: '40px', borderRadius: radius + 'px', overflow: 'hidden' }
			} ),
			button
		);
	}

	/* ---------- block registration ---------- */

	registerBlockType( 'qrc-composer-pro/qr-code', {
		edit: function ( props ) {
			var attributes = props.attributes;
			var setAttributes = props.setAttributes;
			var blockProps = useBlockProps();
			refreshGlobals();

			var permalink = useSelect( function ( select ) {
				try {
					var store = select( 'core/editor' );
					return store && store.getPermalink ? store.getPermalink() : '';
				} catch ( e ) {
					return '';
				}
			}, [] );

			var isProSource = FREE_SOURCES.indexOf( attributes.sourceType ) === -1;
			var data = isProSource ? '' : getQrData( attributes, permalink );

			var preview;
			if ( isProSource ) {
				preview = el( 'p', {}, __( 'This QR code type is available in QR Code Composer Pro. Choose another source type.', TD ) );
			} else if ( ! data ) {
				preview = el( 'p', {}, __( 'Fill in the fields on the right to generate a QR code.', TD ) );
			} else {
				preview = el( QrPreview, { attributes: attributes, data: data } );
			}

			return el( Fragment, {},
				el( InspectorControls, {},
					el( PanelBody, { title: __( 'QR Code Source', TD ), initialOpen: true },
						el( SelectControl, {
							label: __( 'Source Type', TD ),
							value: attributes.sourceType,
							options: SOURCE_OPTIONS,
							onChange: function ( value ) { setAttributes( { sourceType: value } ); }
						} ),
						getFieldControls( attributes, setAttributes )
					),
					el( PanelBody, { title: __( 'QR Code Design', TD ), initialOpen: false },
						getDesignControls( attributes, setAttributes )
					),
					el( PanelBody, { title: __( 'Download Button', TD ), initialOpen: false },
						getButtonControls( attributes, setAttributes )
					)
				),
				el( 'div', blockProps, preview )
			);
		},
		save: function () {
			// Dynamic block: output is generated by render.php.
			return null;
		}
	} );
} )( window.wp );
