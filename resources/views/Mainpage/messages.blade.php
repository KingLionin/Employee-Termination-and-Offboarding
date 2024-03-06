@extends('layouts.layout')

@section('title', 'Messages')

@section('content')

    <div class="card message-annoucement-card">
        <div class="card-header bg-dark d-flex justify-content-between align-items-center">
            <h5 class="fw-bold fs-5 mb-0 text-light">Messages</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#complianceModal">
                Comply to Legal Management
            </button>
        </div>
        <div class="card-body">

            <!-- Request Alert -->
            <div class="alert alert-primary" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="alert-content d-flex align-items-center">
                        <i class="bi bi-envelope-exclamation-fill message-icon"></i>
                        <span>You have a request</span>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal">
                        View Message
                    </button>
                </div>
            </div>

            <!-- Request Modal -->
            @include('components.message-modal', [
                'modalId' => 'requestModal',
                'modalTitle' => 'Message Request',
                'headerColor' => 'bg-primary',
                'sender' => 'Sender Name',
                'employee' => 'Employee Name',
                'department' => 'Department Name',
                'position' => 'Position',
                'requestType' => 'Resignation',
                'description' => 'This is a description of the situation.',
                'documents' => []
            ])

            <!-- Approval Alert -->
            <div class="alert alert-success" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="alert-content d-flex align-items-center">
                        <i class="bi bi-envelope-check-fill message-icon"></i>
                        <span>Your request have been approved!!!</span>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#approvalModal">
                        View Message
                    </button>
                </div>
            </div>

            <!-- Approval Modal -->
            @include('components.message-modal', [
                'modalId' => 'approvalModal',
                'modalTitle' => 'Message Approved',
                'headerColor' => 'bg-success', 
                'sender' => 'Sender Name',
                'employee' => 'Employee Name',
                'department' => 'Department Name',
                'position' => 'Position',
                'requestType' => 'Resignation',
                'description' => 'This is a description of the situation.',
                'documents' => []
            ])

            <!-- Denial Alert -->
            <div class="alert alert-danger" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="alert-content d-flex align-items-center">
                        <i class="bi bi-envelope-slash-fill message-icon"></i>
                        <span>Your request have been denied!!!</span>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#denialModal">
                        View Message
                    </button>
                </div>
            </div>

            <!-- Denial Modal -->
            @include('components.message-modal', [
                'modalId' => 'denialModal',
                'modalTitle' => 'Message Unapproved',
                'headerColor' => 'bg-danger', 
                'sender' => 'Sender Name',
                'employee' => 'Employee Name',
                'department' => 'Department Name',
                'position' => 'Position',
                'requestType' => 'Resignation',
                'description' => 'This is a description of the situation.',
                'documents' => []
            ])

            <!-- Compliance Modal -->
            @include('components.compliance-modal', [
                'modalId' => 'complianceModal',
                'modalTitle' => 'Compliance Form',
                'headerColor' => 'bg-primary',
                'firstName' => 'Sender', // Default to Sender's first name
                'middleName' => '',
                'lastName' => '',
                'department' => 'Department Name',
                'position' => 'Position',
                'employees' => ['Choose Employee...', 'Employee 1', 'Employee 2', 'Employee 3'], // Example dropdown values
                'offboardingTypes' => ['Choose...', 'Termination', 'Resignation', 'Retirement'], // Example dropdown values
                'inputOptions' => ['Choose...' , 'Text Area', 'Word Document', 'PDF Document', 'Image', 'Video'] // Example dropdown values
            ])
        </div>
    </div>

    <div class="card message-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="whr-messages-heading mt-3">Messages Table</h1>
        </div>
        <hr class="border border-dark border-3 opacity-75" />
        <div class="card-body">
            <div id="messagesTableView" class="view-container table-responsive-md">
                <table class="table table-bordered table-hover tbl-messages t-4">
                    <thead class="table-dark">
                        <tr>
                            <th>Message ID</th>
                            <th>Message Status</th>
                            <th>Message Send</th>
                            <th>Message Received</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="messagesTableBody">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
