<?php
namespace InterNations\Component\Solr\Expression;

use InterNations\Component\Solr\ExpressionInterface;
use InterNations\Component\Solr\Util;

/**
 * Class representing boosted queries
 *
 * Class to construct boosted queries in the like of <term>^<boost>
 */
class BoostExpression extends Expression
{
    /**
     * Boost factor
     *
     * @var float
     */
    private $boost;

    /**
     * @param ExpressionInterface|string|null $expr
     */
    public function __construct(float $boost, $expr)
    {
        $this->boost = is_int($boost) ? $boost : (float) $boost;
        parent::__construct($expr);
    }

    public function __toString(): string
    {
        return Util::sanitize($this->expr) . '^' . $this->boost;
    }
}
