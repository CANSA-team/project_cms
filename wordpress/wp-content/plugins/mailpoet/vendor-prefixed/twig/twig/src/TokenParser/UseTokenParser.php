<?php
 namespace MailPoetVendor\Twig\TokenParser; if (!defined('ABSPATH')) exit; use MailPoetVendor\Twig\Error\SyntaxError; use MailPoetVendor\Twig\Node\Expression\ConstantExpression; use MailPoetVendor\Twig\Node\Node; use MailPoetVendor\Twig\Token; final class UseTokenParser extends \MailPoetVendor\Twig\TokenParser\AbstractTokenParser { public function parse(\MailPoetVendor\Twig\Token $token) { $template = $this->parser->getExpressionParser()->parseExpression(); $stream = $this->parser->getStream(); if (!$template instanceof \MailPoetVendor\Twig\Node\Expression\ConstantExpression) { throw new \MailPoetVendor\Twig\Error\SyntaxError('The template references in a "use" statement must be a string.', $stream->getCurrent()->getLine(), $stream->getSourceContext()); } $targets = []; if ($stream->nextIf('with')) { do { $name = $stream->expect( 5 )->getValue(); $alias = $name; if ($stream->nextIf('as')) { $alias = $stream->expect( 5 )->getValue(); } $targets[$name] = new \MailPoetVendor\Twig\Node\Expression\ConstantExpression($alias, -1); if (!$stream->nextIf( 9, ',' )) { break; } } while (\true); } $stream->expect( 3 ); $this->parser->addTrait(new \MailPoetVendor\Twig\Node\Node(['template' => $template, 'targets' => new \MailPoetVendor\Twig\Node\Node($targets)])); return new \MailPoetVendor\Twig\Node\Node(); } public function getTag() { return 'use'; } } \class_alias('MailPoetVendor\\Twig\\TokenParser\\UseTokenParser', 'MailPoetVendor\\Twig_TokenParser_Use'); 