<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ isset($brand) ? $brand->name : __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    @if(isset($brand))
        <h2>Populairste Handleidingen</h2>
        <ul>
            @foreach($populaireHandleidingen as $handleiding)
                <li>
                    <a href="/handleidingen/{{ $handleiding->id }}">{{ $handleiding->title }}</a>
                </li>
            @endforeach
        </ul>

        <h2>Alle Handleidingen</h2>
        <ul>
            @foreach($manuals as $manual)
                <li>
                    <a href="/handleidingen/{{ $manual->id }}">{{ $manual->title }}</a>
                </li>
            @endforeach
        </ul>
    @else
        {{-- Letters Filter --}}
        <div class="letter-filter">
            @foreach(range('A', 'Z') as $letter)
                <a href="{{ route('brands.index', ['letter' => $letter]) }}"
                   class="{{ request('filter_letter') == $letter ? 'active' : '' }}">
                    {{ $letter }}
                </a>
            @endforeach
            <a href="{{ route('brands.index') }}" class="{{ request('filter_letter') ? '' : 'active' }}">All</a>
        </div>

        <?php
        $size = count($brands);
        $columns = 3;
        $chunk_size = ceil($size / $columns);
        ?>

        <div class="container">
            <div class="row">
                @foreach($brands->chunk($chunk_size) as $chunk)
                    <div class="col-md-4">
                        <ul>
                            @foreach($chunk as $brand)
                                <?php
                                $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                                if (!isset($header_first_letter) || $current_first_letter != $header_first_letter) {
                                    echo '</ul><h2>' . $current_first_letter . '</h2><ul>';
                                }
                                $header_first_letter = $current_first_letter;
                                ?>

                                <li>
                                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <?php unset($header_first_letter); ?>
                @endforeach
            </div>
        </div>
    @endif

</x-layouts.app>
