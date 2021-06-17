<?php

namespace Tests\Ui;

use Ignite\Contracts\Form\Fields\Titleable;
use Ignite\Contracts\Ui\Component;
use Ignite\Form\Field;
use Ignite\Form\Fields\Traits\HasTitle;
use Illuminate\Testing\AssertableJsonString;
use PHPUnit\Framework\TestCase;

class FieldHasTitleTest extends TestCase
{
    public function testSetTitle()
    {
        $field = new FieldThatHasTitle('');
        $this->assertSame($field, $field->title('foo'));
        $this->assertSame('foo', $field->title);
    }

    public function testSetTitleTag()
    {
        $field = (new FieldThatHasTitle(''));
        $this->assertSame($field, $field->titleTag('h1'));
        $this->assertSame('h1', $field->titleTag);
    }

    public function testSetHasTitle()
    {
        $field = (new FieldThatHasTitle(''));
        $this->assertTrue($field->hasTitle);
        $this->assertSame($field, $field->hasTitle(false));
        $this->assertFalse($field->hasTitle);
    }

    public function testRendering()
    {
        $field = new FieldThatHasTitle('');
        $field->title('foo');
        $this->assertInstanceOf(Component::class, $component = $field->getComponent());
        $props = new AssertableJsonString($component->getProps());
        $props->assertFragment([
            'title'    => 'foo',
            'hasTitle' => true,
            'titleTag' => 'h5',
        ]);
    }
}

class FieldThatHasTitle extends Field implements Titleable
{
    use HasTitle;
}
