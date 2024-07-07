<?php

namespace Realodix\Collection;

use Illuminate\Support\Arr;

final class Collection
{
    /**
     * The items contained in the collection.
     */
    protected array $items = [];

    /**
     * Create a new collection.
     *
     * @return void
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Get all of the items in the collection.
     */
    public function all(): array
    {
        return $this->items;
    }

    public function filter(?callable $callback = null): self
    {
        if ($callback) {
            return new self(Arr::where($this->items, $callback));
        }

        return new self(array_filter($this->items));
    }

    /**
     * Returns the elements as a plain array.
     *
     * @return array<int|string, mixed> Plain array
     */
    public function toArray(): array
    {
        return $this->items = $this->array($this->items);
    }

    /**
     * Reset the keys on the underlying array.
     */
    public function values(): self
    {
        return new self(array_values($this->items));
    }

    /**
     * Returns a plain array of the given elements.
     *
     * @param mixed $elements List of elements or single value
     * @return array<int|string, mixed> Plain array
     */
    protected function array($elements): array
    {
        if (is_array($elements)) {
            return $elements;
        }

        if ($elements instanceof \Closure) {
            return (array) $elements();
        }

        if ($elements instanceof \Realodix\Collection\Collection) {
            return $elements->toArray();
        }

        if (is_iterable($elements)) {
            return iterator_to_array($elements, true);
        }

        return $elements !== null ? [$elements] : [];
    }
}
