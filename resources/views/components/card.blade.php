<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <!--card title-->
        <h5 class="m-0 font-weight-bold text-dark">
            {{ $title }}
        </h5>
    </div>
    <div class="card-body">
        <!--card content-->
        {{ $slot }}
    </div>
</div>
