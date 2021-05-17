<?php

namespace Drupal\storychief\Plugin\StoryChiefFieldHandler;

use Drupal\storychief\Plugin\FieldHandlerType\ImageFieldHandlerType;

/**
 * Class FeaturedImageStoryChiefFieldHandler.
 *
 * Set the featured image and alt text.
 *
 * @StoryChiefFieldHandler(
 *   id = "featured_image",
 *   label = @Translation("Handle the featured image field."),
 *   drupal_field_name = null,
 * )
 */
class FeaturedImageStoryChiefFieldHandler extends ImageFieldHandlerType {

  /**
   * {@inheritdoc}
   */
  public function setValue($value) {
    parent::setValue($value['data']['sizes']['full']);
  }

  /**
   * {@inheritdoc}
   */
  public function set() {
    parent::set();

    $alt = $this->getPayload()['featured_image']['data']['alt'] ?? $this->getPayload()['title'];

    if($field_name = $this->getDrupalFieldName()) {
        $this->getEntity()->get($field_name)[0]->set('alt', $alt);
    }
  }

}
