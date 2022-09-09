@role('Cashier')
    @include('dashboard')
@endrole
@role('SuperAdmin|Inventory')
@include('adminPanel')
@endrole