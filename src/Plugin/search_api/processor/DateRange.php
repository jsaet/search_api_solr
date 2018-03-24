<?php

namespace Drupal\search_api_solr\Plugin\search_api\processor;

use Drupal\search_api\Datasource\DatasourceInterface;
use Drupal\search_api\Item\ItemInterface;
use Drupal\search_api\Processor\ProcessorPluginBase;
use Drupal\search_api\Processor\ProcessorProperty;
use Drupal\search_api_solr\Plugin\search_api\data_type\value\DateRangeValueInterface;

/**
 * Add date ranges to the index.
 *
 * @SearchApiProcessor(
 *   id = "date_range",
 *   label = @Translation("Date ranges"),
 *   description = @Translation("Date ranges."),
 *   stages = {
 *     "add_properties" = 0,
 *   },
 *   locked = true,
 *   hidden = true,
 * )
 */
class DateRange extends ProcessorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getPropertyDefinitions(DatasourceInterface $datasource = NULL) {
    $properties = array();

    if (!$datasource) {
      $definition = array(
        'type' => 'solr_date_range',
        'label' => $this->t('Date Range'),
        'description' => $this->t('Date ranges.'),
        'processor_id' => $this->getPluginId(),
      );
      $properties['solr_date_range'] = new ProcessorProperty($definition);
    }

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function addFieldValues(ItemInterface $item) {
    /** @var Field $field */
    foreach ($this->getFieldsHelper()->filterForPropertyPath($item->getFields(), NULL, 'solr_date_range') as $field) {
      $entity = $item->getOriginalObject()->getValue();

      // @todo get the date range field from the entity as $item

      if ($type_is_solr_date_range) {
        $field->addValue($item['value'] . DateRangeValueInterface::DELIMITER . $item['end_value']);
      }
      else {
        $field->addValue($item['value'];
      }
    }
  }

}
