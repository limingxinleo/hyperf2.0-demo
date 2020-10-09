<html>
<body>
<h1>Hello, {{ $name }}</h1>
<div>{!! $name !!}</div>
The current UNIX timestamp is {{ time() }}.
<div>
    @switch($name)
        @case("Hyperf")
        Switch to Hyperf;
        @break
        @default
        Switch to Default
        @break
    @endswitch
</div>
<div>
    @env(['dev', 'production'])
        // 应用运行于 「dev」环境或生产环境……
    @endenv
    @production
        Productoin
    @endproduction
</div>
</body>
</html>
