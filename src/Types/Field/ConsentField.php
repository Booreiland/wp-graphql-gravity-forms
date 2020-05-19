<?php

namespace WPGraphQLGravityForms\Types\Field;

use WPGraphQLGravityForms\Types\Field\FieldProperty;

/**
 * Checkbox field.
 *
 * @see https://docs.gravityforms.com/gf_field_checkbox/
 */
class ConsentField extends Field {
    /**
     * Type registered in WPGraphQL.
     */
    const TYPE = 'ConsentField';

    /**
     * Type registered in Gravity Forms.
     */
    const GF_TYPE = 'consent';

    public function register_hooks() {
        add_action( 'graphql_register_types', [ $this, 'register_type' ] );
    }

    public function register_type() {
        register_graphql_object_type( self::TYPE, [
            'description' => __( 'Gravity Forms Consent field.', 'wp-graphql-gravity-forms' ),
            'fields'      => array_merge(
                $this->get_global_properties(),
                FieldProperty\ChoicesProperty::get(),
                FieldProperty\DescriptionProperty::get(),
                FieldProperty\EnableChoiceValueProperty::get(),
                FieldProperty\ErrorMessageProperty::get(),
                FieldProperty\InputNameProperty::get(),
                FieldProperty\IsRequiredProperty::get(),
                FieldProperty\SizeProperty::get(),
                [
                    'checkboxLabel' => [
                        'type'        => 'String',
                        'description' => __('The consent checkbox label.', 'wp-graphql-gravity-forms' ),
                    ],
                    'inputs' => [
                        'type'        => [ 'list_of' => FieldProperty\CheckboxInputProperty::TYPE ],
                        'description' => __( 'List of inputs. Checkboxes are treated as multi-input fields, since each checkbox item is stored separately.', 'wp-graphql-gravity-forms' ),
                    ]
                ]
            ),
        ] );
    }
}
