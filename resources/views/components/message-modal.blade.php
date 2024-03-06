<!-- resources/views/partials/message-modal.blade.php -->

<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header {{ $headerColor }}">
                <h1 class="modal-title fs-8 text-white fw-bold" id="{{ $modalId }}Label">{{ $modalTitle }}</h1>
            </div>

            <div class="modal-body">
                <div class="mb-4">
                    <h6 class="fw-bold">Sender:</h6>
                    <p class="mb-0">{{ $sender }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold">Employee:</h6>
                    <p class="mb-0">{{ $employee }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold">Department:</h6>
                    <p class="mb-0">{{ $department }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold">Position:</h6>
                    <p class="mb-0">{{ $position }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold">Request Type:</h6>
                    <p class="mb-0">{{ $requestType }}</p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold">Description:</h6>
                    <p class="mb-0">{{ $description }}</p>
                </div>

                <!-- Display Documents -->
                <div class="mb-4">
                    <h6 class="fw-bold">Documents:</h6>
                    @if (count($documents) > 0)
                        <ul>
                            @foreach ($documents as $document)
                                <li>{{ $document }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>No document available.</p>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-button">Comply</button>
                </div>
            </div>
        </div>
    </div>
</div>
