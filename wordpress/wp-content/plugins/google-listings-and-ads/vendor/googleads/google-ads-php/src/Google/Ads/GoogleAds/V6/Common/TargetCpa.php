<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/common/bidding.proto

namespace Google\Ads\GoogleAds\V6\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An automated bid strategy that sets bids to help get as many conversions as
 * possible at the target cost-per-acquisition (CPA) you set.
 *
 * Generated from protobuf message <code>google.ads.googleads.v6.common.TargetCpa</code>
 */
class TargetCpa extends \Google\Protobuf\Internal\Message
{
    /**
     * Average CPA target.
     * This target should be greater than or equal to minimum billable unit based
     * on the currency for the account.
     *
     * Generated from protobuf field <code>int64 target_cpa_micros = 4;</code>
     */
    protected $target_cpa_micros = null;
    /**
     * Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>int64 cpc_bid_ceiling_micros = 5;</code>
     */
    protected $cpc_bid_ceiling_micros = null;
    /**
     * Minimum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>int64 cpc_bid_floor_micros = 6;</code>
     */
    protected $cpc_bid_floor_micros = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $target_cpa_micros
     *           Average CPA target.
     *           This target should be greater than or equal to minimum billable unit based
     *           on the currency for the account.
     *     @type int|string $cpc_bid_ceiling_micros
     *           Maximum bid limit that can be set by the bid strategy.
     *           The limit applies to all keywords managed by the strategy.
     *     @type int|string $cpc_bid_floor_micros
     *           Minimum bid limit that can be set by the bid strategy.
     *           The limit applies to all keywords managed by the strategy.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V6\Common\Bidding::initOnce();
        parent::__construct($data);
    }

    /**
     * Average CPA target.
     * This target should be greater than or equal to minimum billable unit based
     * on the currency for the account.
     *
     * Generated from protobuf field <code>int64 target_cpa_micros = 4;</code>
     * @return int|string
     */
    public function getTargetCpaMicros()
    {
        return isset($this->target_cpa_micros) ? $this->target_cpa_micros : 0;
    }

    public function hasTargetCpaMicros()
    {
        return isset($this->target_cpa_micros);
    }

    public function clearTargetCpaMicros()
    {
        unset($this->target_cpa_micros);
    }

    /**
     * Average CPA target.
     * This target should be greater than or equal to minimum billable unit based
     * on the currency for the account.
     *
     * Generated from protobuf field <code>int64 target_cpa_micros = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setTargetCpaMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->target_cpa_micros = $var;

        return $this;
    }

    /**
     * Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>int64 cpc_bid_ceiling_micros = 5;</code>
     * @return int|string
     */
    public function getCpcBidCeilingMicros()
    {
        return isset($this->cpc_bid_ceiling_micros) ? $this->cpc_bid_ceiling_micros : 0;
    }

    public function hasCpcBidCeilingMicros()
    {
        return isset($this->cpc_bid_ceiling_micros);
    }

    public function clearCpcBidCeilingMicros()
    {
        unset($this->cpc_bid_ceiling_micros);
    }

    /**
     * Maximum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>int64 cpc_bid_ceiling_micros = 5;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCpcBidCeilingMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cpc_bid_ceiling_micros = $var;

        return $this;
    }

    /**
     * Minimum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>int64 cpc_bid_floor_micros = 6;</code>
     * @return int|string
     */
    public function getCpcBidFloorMicros()
    {
        return isset($this->cpc_bid_floor_micros) ? $this->cpc_bid_floor_micros : 0;
    }

    public function hasCpcBidFloorMicros()
    {
        return isset($this->cpc_bid_floor_micros);
    }

    public function clearCpcBidFloorMicros()
    {
        unset($this->cpc_bid_floor_micros);
    }

    /**
     * Minimum bid limit that can be set by the bid strategy.
     * The limit applies to all keywords managed by the strategy.
     *
     * Generated from protobuf field <code>int64 cpc_bid_floor_micros = 6;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCpcBidFloorMicros($var)
    {
        GPBUtil::checkInt64($var);
        $this->cpc_bid_floor_micros = $var;

        return $this;
    }

}

