<?php
 namespace MailPoetVendor\Twig\NodeVisitor; if (!defined('ABSPATH')) exit; use MailPoetVendor\Twig\Environment; use MailPoetVendor\Twig\Node\CheckSecurityNode; use MailPoetVendor\Twig\Node\CheckToStringNode; use MailPoetVendor\Twig\Node\Expression\Binary\ConcatBinary; use MailPoetVendor\Twig\Node\Expression\Binary\RangeBinary; use MailPoetVendor\Twig\Node\Expression\FilterExpression; use MailPoetVendor\Twig\Node\Expression\FunctionExpression; use MailPoetVendor\Twig\Node\Expression\GetAttrExpression; use MailPoetVendor\Twig\Node\Expression\NameExpression; use MailPoetVendor\Twig\Node\ModuleNode; use MailPoetVendor\Twig\Node\Node; use MailPoetVendor\Twig\Node\PrintNode; use MailPoetVendor\Twig\Node\SetNode; final class SandboxNodeVisitor extends \MailPoetVendor\Twig\NodeVisitor\AbstractNodeVisitor { private $inAModule = \false; private $tags; private $filters; private $functions; private $needsToStringWrap = \false; protected function doEnterNode(\MailPoetVendor\Twig\Node\Node $node, \MailPoetVendor\Twig\Environment $env) { if ($node instanceof \MailPoetVendor\Twig\Node\ModuleNode) { $this->inAModule = \true; $this->tags = []; $this->filters = []; $this->functions = []; return $node; } elseif ($this->inAModule) { if ($node->getNodeTag() && !isset($this->tags[$node->getNodeTag()])) { $this->tags[$node->getNodeTag()] = $node; } if ($node instanceof \MailPoetVendor\Twig\Node\Expression\FilterExpression && !isset($this->filters[$node->getNode('filter')->getAttribute('value')])) { $this->filters[$node->getNode('filter')->getAttribute('value')] = $node; } if ($node instanceof \MailPoetVendor\Twig\Node\Expression\FunctionExpression && !isset($this->functions[$node->getAttribute('name')])) { $this->functions[$node->getAttribute('name')] = $node; } if ($node instanceof \MailPoetVendor\Twig\Node\Expression\Binary\RangeBinary && !isset($this->functions['range'])) { $this->functions['range'] = $node; } if ($node instanceof \MailPoetVendor\Twig\Node\PrintNode) { $this->needsToStringWrap = \true; $this->wrapNode($node, 'expr'); } if ($node instanceof \MailPoetVendor\Twig\Node\SetNode && !$node->getAttribute('capture')) { $this->needsToStringWrap = \true; } if ($this->needsToStringWrap) { if ($node instanceof \MailPoetVendor\Twig\Node\Expression\Binary\ConcatBinary) { $this->wrapNode($node, 'left'); $this->wrapNode($node, 'right'); } if ($node instanceof \MailPoetVendor\Twig\Node\Expression\FilterExpression) { $this->wrapNode($node, 'node'); $this->wrapArrayNode($node, 'arguments'); } if ($node instanceof \MailPoetVendor\Twig\Node\Expression\FunctionExpression) { $this->wrapArrayNode($node, 'arguments'); } } } return $node; } protected function doLeaveNode(\MailPoetVendor\Twig\Node\Node $node, \MailPoetVendor\Twig\Environment $env) { if ($node instanceof \MailPoetVendor\Twig\Node\ModuleNode) { $this->inAModule = \false; $node->getNode('constructor_end')->setNode('_security_check', new \MailPoetVendor\Twig\Node\Node([new \MailPoetVendor\Twig\Node\CheckSecurityNode($this->filters, $this->tags, $this->functions), $node->getNode('display_start')])); } elseif ($this->inAModule) { if ($node instanceof \MailPoetVendor\Twig\Node\PrintNode || $node instanceof \MailPoetVendor\Twig\Node\SetNode) { $this->needsToStringWrap = \false; } } return $node; } private function wrapNode(\MailPoetVendor\Twig\Node\Node $node, string $name) { $expr = $node->getNode($name); if ($expr instanceof \MailPoetVendor\Twig\Node\Expression\NameExpression || $expr instanceof \MailPoetVendor\Twig\Node\Expression\GetAttrExpression) { $node->setNode($name, new \MailPoetVendor\Twig\Node\CheckToStringNode($expr)); } } private function wrapArrayNode(\MailPoetVendor\Twig\Node\Node $node, string $name) { $args = $node->getNode($name); foreach ($args as $name => $_) { $this->wrapNode($args, $name); } } public function getPriority() { return 0; } } \class_alias('MailPoetVendor\\Twig\\NodeVisitor\\SandboxNodeVisitor', 'MailPoetVendor\\Twig_NodeVisitor_Sandbox'); 