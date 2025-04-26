@php
    use App\Models\SenderId;
    use App\Models\User;
    use App\Models\Message;

    $pendingSenderIds = SenderId::where('status', 'pending')->count();
    $totalUsers = User::count();
    $totalSmsSent = message::where('status', 'sent')->count();
@endphp

<div class="row">
    <div class="col-md-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title">Pending Sender IDs</h5>
                <p class="card-text display-4">{{ $pendingSenderIds }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text display-4">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Total SMS Sent</h5>
                <p class="card-text display-4">{{ $totalSmsSent }}</p>
            </div>
        </div>
    </div>
</div>
