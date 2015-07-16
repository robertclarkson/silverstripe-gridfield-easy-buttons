# Silverstripe Gridfield easy buttons

Adds two new buttons to Silverstripes Gridfield Detailform, Save and Close, and Save and Add Another

![alt text](https://github.com/robertclarkson/silverstripe-gridfield-easy-buttons/blob/master/gridfield-buttons.png "How it looks")

## Maintainer Contact

Robert Clarkson (rob@robertclarkson.net)

## Requirements

SilverStripe 3.1+

## How to use

Easy to add to any Gridfield. On the GridFieldConfig, get the GridfieldDetailForm, then set the ItemRequestClass to this new extension.

```php
//assume you've already got a config, something like this
$gridfieldconfig = GridFieldConfig_RelationEditor::create();

//here's the magic
$detailForm = $gridfieldconfig->getComponentByType('GridFieldDetailForm');
$detailForm->setItemRequestClass('GridfieldDetailFormExtraButtons');

//Then you're adding the config to your gridfield
$myGridfield = new GridField('MyClass', 'My Class', $this->Relation(), $gridfieldconfig);
```
