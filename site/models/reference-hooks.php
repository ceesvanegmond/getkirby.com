<?php

use Kirby\Cms\Pages;
use Kirby\Reference\SectionPage;
use Kirby\Toolkit\Str;

class ReferenceHooksPage extends SectionPage
{
	public function children(): Pages
	{
		if ($this->children !== null) {
			return $this->children;
		}

		$pages    = parent::children();
		$children = array_map(function ($hook) use ($pages) {

			$slug    = Str::slug($hook['Name']);
			$content = $pages->find($slug)?->content()->toArray() ?? [];
			$content = array_merge([
				'title'     => $hook['Name'],
				'arguments' => implode(', ', Str::split($hook['Arguments'])),
				'type'      => $hook['Type'],
				'return'    => $hook['Return'] ?? null
			], $content);

			return [
				'slug'     => $slug,
				'template' => 'reference-hook',
				'model'    => 'reference-hook',
				'num'      => 0,
				'content'  => $content
			];
		}, csv($this->root() . '/hooks.csv'));

		return $this->children = Pages::factory($children, $this);
	}
}
