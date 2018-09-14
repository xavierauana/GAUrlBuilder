<?php
/**
 * Author: Xavier Au
 * Date: 14/9/2018
 * Time: 1:53 PM
 */

namespace Anacreation\GAUrlBuilder;


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
     * @param string $url
     * @param string $source
     */
    public function __construct(string $url, string $source) {

        $this->url = $url;
        $this->source = $source;
    }

    public function get(): string {
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


}