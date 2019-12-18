## Using the modals

Modal methods:
$modal.close(): This can be include on any element. When actioned, the modal will close (see examples below for usage)

### Basic modal
The basic modal can be used to a modal with any content.

#### Options:
 - open-on-load: optional, can be true or false. If true, the modal will open after page load

#### Slots
- footer: optional:  This can contain any content
- trigger: optional:  This can be used to trigger the opening of the modal with a click event. The trigger could be a link or a button. When using a link - make sure you prevent the default action with  @click.prevent



```
<modal open-on-load="true">

<h1 class="font-bold">Leaving so soon</h1>

<p>Why not stay a bit longer?</p>

<template v-slot:footer>
    <div class="button-group">
        <a class= "btn btn-teal" href="www.somthing.com">Continue</a>
        <button @click=$modal.close() class= "btn btn-teal">Cancel</button>
    </div>
</template>

</modal>
```

The basic modal can also be triggered from a button/link or anything else like the below

```
<modal>
    <template v-slot:trigger>
        <a @click.prevent href="#">Click this to open modal</a>
    </template>
    <h1 class="font-bold">Modal header</h1>

    <p>Modal text</p>

    <template v-slot:footer>
        <div class="button-group">
            <a class= "btn btn-teal" href="www.something.com">Continue</a>
            <button @click=$modal.close() class= "btn btn-teal">Cancel</button>
        </div>
    </template>
</modal>
```

### Confirm dialog
The modal can be used to display a modal with any content.

#### Options
-  proceed-button(optional) : defaults to 'Confirm'
- cancel-button(optional) : defaults to 'Cancel'
- message(optional) : defaults to 'Are tyou are?'


```
<confirm-dialog>
        <template v-slot:trigger>
                <button>
                    Modal 1
                </button>
            </template>
</confirm-dialog>
```

### Confirm button
The modal can be used display a modal with custom messaging to allow a user to confirm/can an action

#### Options
-  proceed-button(optional) : defaults to 'Confirm'
- cancel-button(optional) : defaults to 'Cancel'
- message(optional) : defaults to 'Are tyou are?'

```
<form method="POST">
    <confirm-button
        message = "Are you sure you want to delete this item?"
        cancel-button = "Dont delete it"
        proceed-button = "Yes, delete it"
        class="btn btn-teal">Submit
    </confirm-button>
</form>
```
