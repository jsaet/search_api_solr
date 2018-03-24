<?php

namespace Drupal\search_api_solr\Plugin\search_api\data_type\value;

/**
 * Represents a single date range value.
 */
class DateRangeValue implements DateRangeValueInterface {

  /**
   * The start date.
   *
   * @var string
   */
  protected $start;

  /**
   * The end date.
   *
   * @var string
   */
  protected $end;

  /**
   * Constructs a DateRangeValue object.
   *
   * @param string $date_range_string
   *   The date range as string.
   */
  public function __construct($date_range_string) {
    list($this->start, $this->end) = explode(DateRangeValueInterface::DELIMITER, $date_range_string);
  }

  /**
   * {@inheritdoc}
   */
  public function getStart() {
    return $this->start;
  }

  /**
   * {@inheritdoc}
   */
  public function getEnd() {
    return $this->end;
  }

}
