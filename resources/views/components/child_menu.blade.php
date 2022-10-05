@if($categoryParent->categoryChildrent->count())
    <div class="dropdown-menu-child-{{$categoryParent->id}} hidden" aria-labelledby="karlDropdown-{{$categoryParent->id}}" >

        @foreach($categoryParent->categoryChildrent as $categoryChild)
                <a class="dropdown-item" href="{{ route('product.category', [ 'slug' => $categoryChild->slug , 'id' => $categoryChild->id ]) }}">{{ $categoryChild->name }}</a>
                @if($categoryChild->categoryChildrent->count())
                    @include('components.child_menu', ['categoryParent' => $categoryChild])
                @endif
        @endforeach

    </div>
@endif

@section('js')

@endsection
