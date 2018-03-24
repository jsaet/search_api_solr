<?php

namespace Drupal\search_api_solr\Plugin\search_api\data_type;

use Drupal\search_api\Plugin\search_api\data_type\DateDataType;
use Drupal\search_api_solr\Plugin\search_api\data_type\value\DateRangeValue;

/**
 * Provides a date range data type.
 *
 * @SearchApiDataType(
 *   id = "solr_date_range",
 *   label = @Translation("Date range"),
 *   description = @Translation("Date field that contains date ranges."),
 *   fallback = "date",
 *   prefix = "dr"
 * )
 */
class DateRangeDataType extends DateDataType {

  /**
   * {@inheritdoc}
   */
  public function getValue($value) {
    return new DateRangeValue((string) $value);
  }

}
