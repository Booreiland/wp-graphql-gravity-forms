<?php

namespace WPGraphQLGravityForms\Mutations;

use WPGraphQLGravityForms\Types\Input\NameInput;

/**
 * Update a Gravity Forms draft entry name field value.
 */
class UpdateDraftEntryNameFieldValue extends DraftEntryUpdater {
    /**
     * Mutation name.
     */
    const NAME = 'updateDraftEntryNameFieldValue';

    /**
     * @return array The input field value.
     */
    protected function get_value_input_field() : array {
        return [
            'type'        => NameInput::TYPE,
            'description' => __( 'The form field value.', 'wp-graphql-gravity-forms' ),
        ];
    }

    /**
     * @param string The field value.
     *
     * @return string The sanitized field value.
     */
    protected function prepare_field_value( array $value ) : array {
        return [
            'prefix' => sanitize_text_field( $value['prefix'] ),
            'first'  => sanitize_text_field( $value['first'] ),
            'middle' => sanitize_text_field( $value['middle'] ),
            'last'   => sanitize_text_field( $value['last'] ),
            'suffix' => sanitize_text_field( $value['suffix'] )
        ];
    }
}
