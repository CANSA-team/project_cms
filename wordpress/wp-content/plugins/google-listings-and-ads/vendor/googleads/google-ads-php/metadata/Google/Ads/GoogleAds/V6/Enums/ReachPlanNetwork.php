<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/enums/reach_plan_network.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V6\Enums;

class ReachPlanNetwork
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
6google/ads/googleads/v6/enums/reach_plan_network.protogoogle.ads.googleads.v6.enums"�
ReachPlanNetworkEnum"
ReachPlanNetwork
UNSPECIFIED 
UNKNOWN
YOUTUBE
GOOGLE_VIDEO_PARTNERS%
!YOUTUBE_AND_GOOGLE_VIDEO_PARTNERSB�
!com.google.ads.googleads.v6.enumsBReachPlanNetworkProtoPZBgoogle.golang.org/genproto/googleapis/ads/googleads/v6/enums;enums�GAA�Google.Ads.GoogleAds.V6.Enums�Google\\Ads\\GoogleAds\\V6\\Enums�!Google::Ads::GoogleAds::V6::Enumsbproto3'
        , true);
        static::$is_initialized = true;
    }
}

