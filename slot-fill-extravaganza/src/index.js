import { registerPlugin } from '@wordpress/plugins';
import { PluginPostStatusInfo, PluginDocumentSettingPanel, PluginSidebar } from '@wordpress/edit-post';
import { __ } from '@wordpress/i18n';
import { PanelBody, TextControl, SelectControl, Button } from '@wordpress/components';
import { useState } from '@wordpress/element'; // React for Gutenberg
import { PluginBlockSettingsMenuItem } from '@wordpress/editor';


const SlotFillExtravaganza = () => {
    // Use useState to manage the state of text and select
    const [text, setText] = useState('');
    const [select, setSelect] = useState('a');

    return (
        <>
            <PluginPostStatusInfo>
                { __( 'Post Status Info', 'slot-fill-extravaganza' ) }
            </PluginPostStatusInfo>

            <PluginDocumentSettingPanel 
                name="custom-panel"
                title={ __( 'Custom Panel', 'slot-fill-extravaganza' ) }
                className="custom-panel"
            >
                { __( 'Plugin Document Setting Panel', 'slot-fill-extravaganza' ) }
            </PluginDocumentSettingPanel>

            <PluginSidebar
                name="plugin-sidebar-example"
                title={ __( 'My PluginSidebar', 'slot-fill-extravaganza' ) }
                icon={ 'smiley' }
            >
                <PanelBody>
                    <h2>{ __( 'This is a heading for the PluginSidebar example.', 'slot-fill-extravaganza' ) }</h2>
                    <p>{ __( 'This is some example text for the PluginSidebar example.', 'slot-fill-extravaganza' ) }</p>
                    
                    <TextControl
                        label={ __( 'Text Control', 'slot-fill-extravaganza' ) }
                        value={ text }
                        onChange={ ( newText ) => setText( newText ) }
                    />
                    
                    <SelectControl
                        label={ __( 'Select Control', 'slot-fill-extravaganza' ) }
                        value={ select }
                        options={ [
                            { value: 'a', label: 'Option A' },
                            { value: 'b', label: 'Option B' },
                            { value: 'c', label: 'Option C' },
                        ] }
                        onChange={ ( newSelect ) => setSelect( newSelect ) }
                    />
                    
                    <Button variant="primary">
                        { __( 'Primary Button', 'slot-fill-extravaganza' ) }
                    </Button>
                </PanelBody>
            </PluginSidebar>


            <PluginBlockSettingsMenuItem
                allowedBlocks={ [ 'core/paragraph' ] }
                icon="smiley"
                label="Menu item text"
                onClick={ () => {
                    alert( 'clicked' );
                } }
        />

        </>
    );
}

// Register the plugin
registerPlugin( 'slot-fill-extravaganza', { render: SlotFillExtravaganza, icon: 'smiley' } );
