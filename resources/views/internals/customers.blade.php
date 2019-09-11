<h1>Customers</h1>

{{--This is php syntax--}}
{{--{--<ul>--}}
{{--    php--}}
{{--        foreach ($customers as $customer) {--}}
{{--            echo '<li>' . $customer . '</li>';--}}
{{--        }--}}
{{--    ?>--}}
{{--</ul>--}}

{{--This is blade syntax--}}
<ul>
    @foreach($customers as $customer)
        <li>{{ $customer }}</li>
    @endforeach
</ul>
