<?php
/**
 * Author: Xavier Au
 * Date: 14/9/2018
 * Time: 1:53 PM
 */

namespace Anacreation\GAUrlBuilder;


use Anacreation\GAUrlBuilder\Exception\URLBuilderException;

class Builder
{
    private $url;
    private $source;

    private $medium;
    private $name;
    private $term;
    private $content;

    /**
     * Builder constructor.
     * @return string
     * @throws \Anacreation\GAUrlBuilder\Exception\URLBuilderException
     */

    public function get(): string {
        
        if ($this->url === null) {
            throw new URLBuilderException("NO URL");
        }
        if ($this->source === null) {
            throw new URLBuilderException("NO Source");
        }

        $data = [
            "utm_source"   => $this->source,
            "utm_medium"   => $this->medium,
            "utm_campaign" => $this->name,
            "utm_term"     => $this->term,
            "utm_content"  => $this->content,
        ];

        $query = http_build_query($data);

        return $this->url . "?{$query}";
    }

    /**
     * @param mixed $medium
     * @return Builder
     */
    public function setMedium($medium) {
        $this->medium = $medium;

        return $this;
    }

    /**
     * @param mixed $name
     * @return Builder
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * @param mixed $term
     * @return Builder
     */
    public function setTerm($term) {
        $this->term = $term;

        return $this;
    }

    /**
     * @param mixed $content
     * @return Builder
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * @param mixed $url
     * @return Builder
     */
    public function setUrl($url) {
        $this->url = $url;

        return $this;
    }

    /**
     * @param mixed $source
     * @return Builder
     */
    public function setSource($source) {
        $this->source = $source;

        return $this;
    }


}