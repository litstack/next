<?php

namespace Tests\Ui;

use Ignite\Contracts\Form\Fields\Titleable;
use Ignite\Form\Field;
use Ignite\Form\Fields\Traits\HasTitle;
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
}

class FieldThatHasTitle extends Field implements Titleable
{
    use HasTitle;
}
