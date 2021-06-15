<?php
 namespace MailPoetVendor\Doctrine\ORM\Query; if (!defined('ABSPATH')) exit; interface TreeWalker { public function __construct($query, $parserResult, array $queryComponents); public function getQueryComponents(); public function setQueryComponent($dqlAlias, array $queryComponent); function walkSelectStatement(\MailPoetVendor\Doctrine\ORM\Query\AST\SelectStatement $AST); function walkSelectClause($selectClause); function walkFromClause($fromClause); function walkFunction($function); function walkOrderByClause($orderByClause); function walkOrderByItem($orderByItem); function walkHavingClause($havingClause); function walkJoin($join); function walkSelectExpression($selectExpression); function walkQuantifiedExpression($qExpr); function walkSubselect($subselect); function walkSubselectFromClause($subselectFromClause); function walkSimpleSelectClause($simpleSelectClause); function walkSimpleSelectExpression($simpleSelectExpression); function walkAggregateExpression($aggExpression); function walkGroupByClause($groupByClause); function walkGroupByItem($groupByItem); function walkUpdateStatement(\MailPoetVendor\Doctrine\ORM\Query\AST\UpdateStatement $AST); function walkDeleteStatement(\MailPoetVendor\Doctrine\ORM\Query\AST\DeleteStatement $AST); function walkDeleteClause(\MailPoetVendor\Doctrine\ORM\Query\AST\DeleteClause $deleteClause); function walkUpdateClause($updateClause); function walkUpdateItem($updateItem); function walkWhereClause($whereClause); function walkConditionalExpression($condExpr); function walkConditionalTerm($condTerm); function walkConditionalFactor($factor); function walkConditionalPrimary($primary); function walkExistsExpression($existsExpr); function walkCollectionMemberExpression($collMemberExpr); function walkEmptyCollectionComparisonExpression($emptyCollCompExpr); function walkNullComparisonExpression($nullCompExpr); function walkInExpression($inExpr); function walkInstanceOfExpression($instanceOfExpr); function walkLiteral($literal); function walkBetweenExpression($betweenExpr); function walkLikeExpression($likeExpr); function walkStateFieldPathExpression($stateFieldPathExpression); function walkComparisonExpression($compExpr); function walkInputParameter($inputParam); function walkArithmeticExpression($arithmeticExpr); function walkArithmeticTerm($term); function walkStringPrimary($stringPrimary); function walkArithmeticFactor($factor); function walkSimpleArithmeticExpression($simpleArithmeticExpr); function walkPathExpression($pathExpr); function walkResultVariable($resultVariable); function getExecutor($AST); } 