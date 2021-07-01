<?php
 namespace MailPoetVendor\Doctrine\Common\Collections\Expr; if (!defined('ABSPATH')) exit; class Comparison implements \MailPoetVendor\Doctrine\Common\Collections\Expr\Expression { const EQ = '='; const NEQ = '<>'; const LT = '<'; const LTE = '<='; const GT = '>'; const GTE = '>='; const IS = '='; const IN = 'IN'; const NIN = 'NIN'; const CONTAINS = 'CONTAINS'; const MEMBER_OF = 'MEMBER_OF'; const STARTS_WITH = 'STARTS_WITH'; const ENDS_WITH = 'ENDS_WITH'; private $field; private $op; private $value; public function __construct($field, $operator, $value) { if (!$value instanceof \MailPoetVendor\Doctrine\Common\Collections\Expr\Value) { $value = new \MailPoetVendor\Doctrine\Common\Collections\Expr\Value($value); } $this->field = $field; $this->op = $operator; $this->value = $value; } public function getField() { return $this->field; } public function getValue() { return $this->value; } public function getOperator() { return $this->op; } public function visit(\MailPoetVendor\Doctrine\Common\Collections\Expr\ExpressionVisitor $visitor) { return $visitor->walkComparison($this); } } 