<section>
    {{-- items table --}}
    <x-catagories-items-table :items="$items" :catagorie="$catagorie" />

    {{-- Delete notification --}}
    @if (session('succesDelete'))
        <x-deleteSucces />
    @endif


    {{-- Succes notification --}}
    @if (session('succesMessage'))
        <x-formSucces />
    @endif


    {{-- Error notification --}}
    @if ($errors->all() != null || session('errorMessage'))
        <x-formError :message="$errors->all()" />
    @endif


    {{-- delete warning --}}
    <x-deleteWarning />


    {{-- copy alert --}}
    <x-copy-alert />


    {{-- Add item dialog --}}
    <x-add-item-dialog :catagorie="$catagorie" />

    {{-- Edit dialogs --}}
    <x-edit-item-dialog />

</section>