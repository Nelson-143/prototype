@extends('layouts.tabler')
@section('title', 'Broadcasting Name')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<div class="container-xl px-4 mt-4">
    @include('profile.component.menu')
    <hr class="mt-0 mb-4" />
    @include('partials.session')
    
    <div class="alert alert-warning">
        <i class="ti ti-alert-circle me-2"></i>
        <strong>Important:</strong> Once set, your broadcast name <b>cannot be changed</b>. Ensure accuracy before submission.
    </div>

    <div class="page-header">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Manage Broadcasting Name</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" id="sender-id-card">
                        <div class="card-header">
                            <h3 class="card-title">Sender ID Management</h3>
                        </div>
                        <div class="card-body">
                            <div id="notification-container"></div>

                            @if ($senderId)
                                <div class="card card-lg mb-4">
                                    <div class="card-body">
                                        <h5>Current Sender ID:</h5>
                                        <p><strong>{{ $senderId->name }}</strong></p>
                                        <p>Status: 
                                            <span class="badge bg-{{ $senderId->status == 'approved' ? 'green' : ($senderId->status == 'pending' ? 'yellow' : 'red') }}-lt">
                                                {{ ucfirst($senderId->status) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <h5>No Sender ID found.</h5>
                            @endif

                            <form id="sender-id-form" autocomplete="off">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">New Sender ID</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your sender ID" required>
                                    <small class="form-hint"><i class="ti ti-info-circle me-2"></i> Must be 3-11 characters long and unique.</small>
                                    <div id="name-error" class="invalid-feedback d-none"></div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <span id="submit-text">Submit Request</span>
                                        <span id="loading-spinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("sender-id-form");
    const nameInput = document.getElementById("name");
    const nameError = document.getElementById("name-error");
    const submitBtn = document.querySelector("#sender-id-form button");
    const submitText = document.getElementById("submit-text");
    const spinner = document.getElementById("loading-spinner");
    const notificationContainer = document.getElementById("notification-container");
    
    function showNotification(type, message) {
        const alertDiv = document.createElement("div");
        alertDiv.className = `alert alert-${type} alert-dismissible animate__animated animate__fadeIn`;
        alertDiv.innerHTML = `<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>${message}`;
        notificationContainer.innerHTML = "";
        notificationContainer.appendChild(alertDiv);
    }

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        nameError.classList.add("d-none");
        submitText.textContent = "Processing...";
        spinner.classList.remove("d-none");
        
        fetch("{{ route('sender-id.store') }}", {
            method: "POST",
            body: new FormData(form),
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                form.reset();
                showNotification("success", data.message);
                setTimeout(() => location.reload(), 2000);
            } else {
                nameError.textContent = data.message;
                nameError.classList.remove("d-none");
            }
        })
        .catch(() => showNotification("danger", "An unexpected error occurred."))
        .finally(() => {
            submitText.textContent = "Submit Request";
            spinner.classList.add("d-none");
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Handle form submission via AJAX
    document.getElementById('sender-id-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        const formData = new FormData(this);
        const url = "{{ route('sender-id.store') }}";
        const csrfToken = "{{ csrf_token() }}";

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Clear form fields
                document.getElementById('sender-id-form').reset();
                // Show success message
                showNotification('success', data.message);
            } else {
                // Show error message with shake animation
                showNotification('error', data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('error', 'An unexpected error occurred.');
        });
    });

    // Function to show notifications
    function showNotification(type, message) {
        const alertContainer = document.querySelector('.card-body');
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible animate__animated animate__${type === 'success' ? 'fadeIn' : 'shakeX'}`;
        alertDiv.setAttribute('role', 'alert');

        alertDiv.innerHTML = `
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            ${message}
        `;

        alertContainer.insertBefore(alertDiv, alertContainer.firstChild);

        // Automatically remove the alert after 5 seconds
        setTimeout(() => {
            alertDiv.classList.add('animate__fadeOut');
            alertDiv.addEventListener('animationend', () => alertDiv.remove());
        }, 5000);
    }
});
</script>

@endsection