[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/lagdo/ui-builder/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/lagdo/ui-builder/?branch=main)
[![StyleCI](https://styleci.io/repos/449479108/shield?branch=main)](https://styleci.io/repos/449479108)

[![Latest Stable Version](https://poser.pugx.org/lagdo/ui-builder/v/stable)](https://packagist.org/packages/lagdo/ui-builder)
[![Total Downloads](https://poser.pugx.org/lagdo/ui-builder/downloads)](https://packagist.org/packages/lagdo/ui-builder)
[![License](https://poser.pugx.org/lagdo/ui-builder/license)](https://packagist.org/packages/lagdo/ui-builder)

A customizable and extensible HTML UI builder
=============================================

This package provides a unified API in PHP to create UI for CSS frameworks like Bootstrap.

It extends the [PHP HTML builder](https://github.com/avplab/php-html-builder) with functions to create UI components like menus, forms, tabs and so on.

### Motivation

This UI builder was first created for [Jaxon DbAdmin](https://github.com/lagdo/jaxon-dbadmin), a database admin dashboard that can be inserted in a page of an existing PHP application.
Its user interface then needs to adapt to various CSS frameworks, with as little effort as possible.
So rewriting all the views for each supported CSS framework was not a satisfying option.

Using this UI buider, the UI of the app is writed once, and the HTML code for CSS frameworks is generated automatically.
Adding support of a given CSS framework is then easier and less error-prone.

### Getting Started

The `BuilderInterface` in the `src/` directory defines the functions that can be used to build user interfaces, in addition to those provided by the [PHP HTML builder](https://github.com/avplab/php-html-builder).
While the later only generates HTML code, the `BuilderInterface` functions will also add the CSS classes defined by the frameworks for the UI components.

The class that generates the final HTML code is provided by a separate package, which must be installed in addition to this one.

#### Prerequisites

This package requires PHP version 7.1 or greater.

#### Installation

Install the packages using Composer.
In the examples below, we will build simple UI components for the Bootstrap framework.

```bash
composer require ui-builder ui-builder-bootstrap
```

### Usage

The `BuilderInterface` defines the functions that are use to build the UI components.
In this example, it is passed as parameter to the `View` class constructor.

```php
use Lagdo\UiBuilder\BuilderInterface;

class View
{
    /**
     * @var BuilderInterface
     */
    protected $uiBuilder;

    /**
     * @param BuilderInterface
     */
    public function __construct(BuilderInterface $uiBuilder)
    {
        $this->uiBuilder = $uiBuilder;
    }

    /**
     * Get the HTML code of a simple form
     *
     * @param array $formData
     * @return string
     */
    public function getSimpleForm(array $formData)
    {
        $this->htmlBuilder->clear()
            ->form(true)->setId('form-id')
                ->formRow()
                    ->formCol(4)
                        ->formLabel()->setFor('name')->addText('Name')
                        ->end()
                    ->end()
                    ->formCol(8)
                        ->formInput()->setType('text')->setName('name')->setPlaceholder('Name')
                            ->setValue($formData['name'])
                        ->endShorted()
                    ->end()
                ->end()
                ->formRow()
                    ->formCol(4)
                        ->formLabel()->setFor('description')->addText('Description')
                        ->end()
                    ->end()
                    ->formCol(8)
                        ->formTextarea()->setRows('10')->setName('description')->setWrap('on')
                            ->setSpellcheck('false')->addText($formData['description'])
                        ->end()
                    ->end()
                ->end()
            ->end();
        return $this->htmlBuilder->build();
    }
}
```

Depending on which class instance is passed to the `View` constructor, a different HTML code will be generated.

With the following PHP code,
```php
use Lagdo\UiBuilder\Bootstrap\Bootstrap3\Builder;

$view = new View(new Builder());
```
the `getSimpleForm()` function will generate code for Bootstrap 3.
```html
<form class="form-horizontal" id="form-id">
    <div class="form-group">
        <div class="col-md-4">
            <label class="control-label" for="name">Name</label>
        </div>
        <div class="col-md-8">
            <input class="form-control" type="text" name="name" placeholder="Name" value="" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4">
            <label class="control-label" for="description">Description</label>
        </div>
        <div class="col-md-8">
            <textarea class="form-control" rows="10" name="description" wrap="on" spellcheck="false"></textarea>
        </div>
    </div>
</form>
```

And with the following PHP code,
```php
use Lagdo\UiBuilder\Bootstrap\Bootstrap3\Builder;

$view = new View(new Builder());
```
the same `getSimpleForm()` function will generate code for Bootstrap 4.
```html
<form id="form-id">
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-form-label" for="name">Name</label>
        </div>
        <div class="col-md-8">
            <input class="form-control" type="text" name="name" placeholder="Name" value="" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <label class="col-form-label" for="description">Description</label>
        </div>
        <div class="col-md-8">
            <textarea class="form-control" rows="10" name="description" wrap="on" spellcheck="false"></textarea>
        </div>
    </div>
</form>
```

### Documentation

Coming soon...

### Roadmap

- [ ] Add more components in the interface
- [ ] Add support of more UI frameworks
- [ ] Add tests

See the [open issues](https://github.com/lagdo/ui-builder/issues) for a full list of proposed features (and known issues).

### Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### License

Distributed under the MIT License. See `LICENSE.txt` for more information.
