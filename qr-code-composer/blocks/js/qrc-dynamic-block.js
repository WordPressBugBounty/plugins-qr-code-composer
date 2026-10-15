( function ( blocks, element, blockEditor, components, apiFetch, i18n, ServerSideRender ) {
	var el = element.createElement;
	var useState = element.useState;
	var useEffect = element.useEffect;
	var Fragment = element.Fragment;
	var __ = i18n.__;

	var InspectorControls = blockEditor.InspectorControls;
	var MediaUpload = blockEditor.MediaUpload;
	var MediaUploadCheck = blockEditor.MediaUploadCheck;
	var PanelBody = components.PanelBody;
	var PanelColorSettings = blockEditor.PanelColorSettings || components.PanelColorSettings;
	var SelectControl = components.SelectControl;
	var TextControl = components.TextControl;
	var RangeControl = components.RangeControl;
	var ToggleControl = components.ToggleControl;
	var Button = components.Button;
	var Notice = components.Notice;

	blocks.registerBlockType( 'qrc-composer-pro/dynamic-qr', {
		title: __( 'Dynamic QR Code', 'qrc_composer_pro' ),
		description: __( 'Display a dynamic QR code that visitors can scan or download. Its destination can be changed later without reprinting.', 'qrc_composer_pro' ),
		icon: element.createElement('img', {
    src: qrcDynamicBlock.pluginUrl + 'img/lofg.png'
}),
		category: 'widgets',
		attributes: {
			linkId: { type: 'number', default: 0 },
			size: { type: 'number', default: 220 },
			showTitle: { type: 'boolean', default: true },
			showDownload: { type: 'boolean', default: true },
			downloadBtnBg: { type: 'string', default: '#2563eb' },
			downloadBtnColor: { type: 'string', default: '#ffffff' },
			downloadBtnPadding: { type: 'number', default: 10 },
			downloadBtnRadius: { type: 'number', default: 6 },
			customLogoId: { type: 'number', default: 0 },
			customLogoUrl: { type: 'string', default: '' }
		},

		edit: function ( props ) {
			var attributes = props.attributes;
			var setAttributes = props.setAttributes;

			var linksState = useState( [] );
			var links = linksState[ 0 ];
			var setLinks = linksState[ 1 ];

			var draftState = useState( { title: '', url: '', creating: false, error: '' } );
			var draft = draftState[ 0 ];
			var setDraft = draftState[ 1 ];

			useEffect( function () {
				apiFetch( { path: '/qrc/v1/dynamic-links' } )
					.then( function ( results ) {
						setLinks( results || [] );
					} )
					.catch( function () {
						setLinks( [] );
					} );
			}, [] );

			function createLink() {
				if ( ! draft.url ) {
					setDraft( Object.assign( {}, draft, { error: __( 'Destination URL is required.', 'qrc_composer_pro' ) } ) );
					return;
				}
				setDraft( Object.assign( {}, draft, { creating: true, error: '' } ) );

				apiFetch( {
					path: '/qrc/v1/dynamic-links',
					method: 'POST',
					data: { title: draft.title, destination_url: draft.url }
				} )
					.then( function ( result ) {
						setAttributes( { linkId: result.id } );
						setLinks( links.concat( [ { id: result.id, title: result.title || draft.title } ] ) );
						setDraft( { title: '', url: '', creating: false, error: '' } );
					} )
					.catch( function ( err ) {
						setDraft(
							Object.assign( {}, draft, {
								creating: false,
								error: ( err && err.message ) || __( 'Could not create the dynamic QR code.', 'qrc_composer_pro' )
							} )
						);
					} );
			}

			var options = [ { label: __( '— Select a dynamic QR code —', 'qrc_composer_pro' ), value: 0 } ].concat(
				links.map( function ( link ) {
					return { label: link.title, value: link.id };
				} )
			);

			return el(
				Fragment,
				{},
				el(
					InspectorControls,
					{},
					el(
						PanelBody,
						{ title: __( 'Dynamic QR Code', 'qrc_composer_pro' ), initialOpen: true },
						el( SelectControl, {
							label: __( 'Existing dynamic QR code', 'qrc_composer_pro' ),
							value: attributes.linkId,
							options: options,
							onChange: function ( value ) {
								setAttributes( { linkId: parseInt( value, 10 ) || 0 } );
							}
						} ),
						el( RangeControl, {
							label: __( 'Size (px)', 'qrc_composer_pro' ),
							value: attributes.size,
							min: 80,
							max: 600,
							onChange: function ( value ) {
								setAttributes( { size: value } );
							}
						} ),
						el( ToggleControl, {
							label: __( 'Show title', 'qrc_composer_pro' ),
							checked: attributes.showTitle,
							onChange: function ( value ) {
								setAttributes( { showTitle: value } );
							}
						} ),
						el( ToggleControl, {
							label: __( 'Show download link', 'qrc_composer_pro' ),
							checked: attributes.showDownload,
							onChange: function ( value ) {
								setAttributes( { showDownload: value } );
							}
						} )
					),
					attributes.showDownload
						? el(
								PanelColorSettings,
								{
									title: __( 'Download Button Style', 'qrc_composer_pro' ),
									initialOpen: false,
									colorSettings: [
										{
											value: attributes.downloadBtnBg,
											onChange: function ( value ) {
												setAttributes( { downloadBtnBg: value || '#2563eb' } );
											},
											label: __( 'Background color', 'qrc_composer_pro' )
										},
										{
											value: attributes.downloadBtnColor,
											onChange: function ( value ) {
												setAttributes( { downloadBtnColor: value || '#ffffff' } );
											},
											label: __( 'Text color', 'qrc_composer_pro' )
										}
									]
								},
								el( RangeControl, {
									label: __( 'Padding (px)', 'qrc_composer_pro' ),
									value: attributes.downloadBtnPadding,
									min: 4,
									max: 30,
									onChange: function ( value ) {
										setAttributes( { downloadBtnPadding: value } );
									}
								} ),
								el( RangeControl, {
									label: __( 'Corner radius (px)', 'qrc_composer_pro' ),
									value: attributes.downloadBtnRadius,
									min: 0,
									max: 30,
									onChange: function ( value ) {
										setAttributes( { downloadBtnRadius: value } );
									}
								} )
						  )
						: null,
					el(
						PanelBody,
						{ title: __( 'Custom Logo', 'qrc_composer_pro' ), initialOpen: false },
						el( 'p', { className: 'components-base-control__help', style: { marginTop: 0 } },
							__( 'Overrides the default logo from plugin settings for this QR code only.', 'qrc_composer_pro' )
						),
						attributes.customLogoUrl
							? el( 'img', {
									src: attributes.customLogoUrl,
									alt: '',
									style: { maxWidth: '80px', maxHeight: '80px', display: 'block', marginBottom: '8px', border: '1px solid #e2e8f0', borderRadius: '4px' }
							  } )
							: null,
						el(
							MediaUploadCheck,
							{},
							el( MediaUpload, {
								onSelect: function ( media ) {
									setAttributes( { customLogoId: media.id, customLogoUrl: media.url } );
								},
								allowedTypes: [ 'image' ],
								value: attributes.customLogoId,
								render: function ( obj ) {
									return el(
										Fragment,
										{},
										el(
											Button,
											{ variant: 'secondary', onClick: obj.open },
											attributes.customLogoId
												? __( 'Replace Logo', 'qrc_composer_pro' )
												: __( 'Upload Logo', 'qrc_composer_pro' )
										),
										attributes.customLogoId
											? el(
													Button,
													{
														variant: 'link',
														isDestructive: true,
														style: { marginLeft: '8px' },
														onClick: function () {
															setAttributes( { customLogoId: 0, customLogoUrl: '' } );
														}
													},
													__( 'Remove', 'qrc_composer_pro' )
											  )
											: null
									);
								}
							} )
						)
					),
					el(
						PanelBody,
						{ title: __( 'Create a new dynamic QR code', 'qrc_composer_pro' ), initialOpen: false },
						draft.error ? el( Notice, { status: 'error', isDismissible: false }, draft.error ) : null,
						el( TextControl, {
							label: __( 'Title', 'qrc_composer_pro' ),
							value: draft.title,
							onChange: function ( value ) {
								setDraft( Object.assign( {}, draft, { title: value } ) );
							}
						} ),
						el( TextControl, {
							label: __( 'Destination URL', 'qrc_composer_pro' ),
							value: draft.url,
							onChange: function ( value ) {
								setDraft( Object.assign( {}, draft, { url: value } ) );
							}
						} ),
						el(
							Button,
							{ variant: 'primary', isBusy: draft.creating, onClick: createLink },
							__( 'Create & use', 'qrc_composer_pro' )
						)
					)
				),
				attributes.linkId
					? el( ServerSideRender, { block: 'qrc-composer-pro/dynamic-qr', attributes: attributes } )
					: el( 'p', {}, __( 'Choose or create a dynamic QR code from the block settings →', 'qrc_composer_pro' ) )
			);
		},

		save: function () {
			return null; // Dynamic block — rendered server-side by render_callback.
		}
	} );
} )(
	window.wp.blocks,
	window.wp.element,
	window.wp.blockEditor,
	window.wp.components,
	window.wp.apiFetch,
	window.wp.i18n,
	window.wp.serverSideRender
);