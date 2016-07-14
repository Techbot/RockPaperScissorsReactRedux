<?php 
namespace Application\Domain;

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\UuidInterface;



final class GameId
{
    /**
     * @var Uuid
     */
    protected $value;
    /**
     * @param Uuid $value
     */
    private function __construct(Uuid $value)
    {
        $this->value = $value;
    }
    /**
     * @return static
     */
    public static function generate()
    {
        return new static(Uuid::uuid4());
    }
    /**
     * @param string $value
     * @return static
     */
    public static function fromString($value)
    {
        return new static(Uuid::fromString($value));
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value->toString();
    }
    /**
     * @param GameId $id
     * @return bool
     */
    public function matches(GameId $id)
    {
        return (string) $id == (string) $this;
    }
}