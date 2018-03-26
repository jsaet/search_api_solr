<?php

namespace Drupal\search_api_solr\Plugin\search_api\processor;

use Drupal\search_api\Processor\ProcessorPluginBase;
use Drupal\search_api_solr\Plugin\search_api\data_type\value\DateRangeValue;

/**
 * Add date ranges to the index.
 *
 * @SearchApiProcessor(
 *   id = "solr_date_range",
 *   label = @Translation("Date ranges"),
 *   description = @Translation("Date ranges."),
 *   stages = {
 *     "preprocess_index" = 0,
 *   },
 *   locked = true,
 *   hidden = true,
 * )
 */
class DateRange extends ProcessorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function preprocessIndexItems(array $items) {
    foreach ($items as $item) {
      /** @var \Drupal\search_api\Item\FieldInterface $field */
      foreach ($item->getFields() as $name => $field) {
        if ('solr_date_range' == $field->getType()) {
          /** @var \Drupal\Core\Entity\Plugin\DataType\EntityAdapter $entity_adapter */
          $entity_adapter = $item->getOriginalObject();
          /** @var \Drupal\Core\Entity\ContentEntityInterface $original_entity */
          $original_entity = $entity_adapter->getValue();
          $values = [];
          foreach ($original_entity->{$name}->getValue() as $key => $dates) {
            $values[$key] = new DateRangeValue($dates['value'], $dates['end_value']);
          }
          $field->setValues($values);
        }
      }
    }
  }

}
