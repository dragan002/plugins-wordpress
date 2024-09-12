
import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';

registerBlockType( /* ... */ {
    // ...

    attributes: {
        content: {
            type: 'string',
            source: 'html',
            selector: 'h2',
        },
    },

    edit( { attributes, setAttributes } ) {
        const blockProps = useBlockProps();

        return (
            <RichText
                { ...blockProps }
                tagName="h1" // The tag here is the element output and editable in the admin
                value={ attributes.content } // Any existing content, either from the database or an attribute default
                allowedFormats={ [ 'core/bold', 'core/italic' ] } // Allow the content to be made bold or italic, but do not allow other formatting options
                onChange={ ( content ) => setAttributes( { content } ) } // Store updated content as a block attribute
                placeholder={ __( 'Heading...' ) } // Display this text before any content has been added by the user
            />
        );
    },

    save( { attributes } ) {
        const blockProps = useBlockProps.save();

        return <RichText.Content { ...blockProps } tagName="h2" value={ attributes.content } />; // Saves <h2>Content added in the editor...</h2> to the database for frontend display
    }
} );