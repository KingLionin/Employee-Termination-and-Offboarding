<div class="modal fade" id="{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header {{ $headerColor }}">
                <h1 class="modal-title fs-8 text-white fw-bold" id="{{ $modalId }}Label">{{ $modalTitle }}</h1>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="firstName" class="form-label fw-bold">Firstname</label>
                    <input type="text" class="form-control" id="firstName_compliance" name="firstName" value="Jefferson" readonly>
                </div>

                <div class="mb-3">
                    <label for="middleName" class="form-label fw-bold">Middlename</label>
                    <input type="text" class="form-control" id="middleName_compliance" name="middleName" value="Agagdang" readonly>
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label fw-bold">Lastname</label>
                    <input type="text" class="form-control" id="lastName_compliance" name="lastName" value="Villanueva" readonly>
                </div>

                <div class="mb-3">
                    <label for="department" class="form-label fw-bold">Department</label>
                    <input type="text" class="form-control" id="department_compliance" name="department" value="Human Resource" readonly>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label fw-bold">Position</label>
                    <input type="text" class="form-control" id="position_compliance" name="position" value="HR Executive Manager" readonly>
                </div>

                <div class="mb-3">
                    <label for="employee" class="form-label fw-bold">Select Employee</label>
                    <select class="form-select" id="employee" name="employee" required>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee }}">{{ $employee }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="offboardingType" class="form-label fw-bold">Select Offboarding Type</label>
                    <select class="form-select" id="offboardingType" name="offboardingType" required>
                        @foreach ($offboardingTypes as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="textAreaInput" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" id="textAreaInput" name="textAreaInput" placeholder="Describe your request"></textarea>
                </div>

                <!-- Additional fields as needed -->

                <!-- Input area for documents, images, and videos -->
                <div id="documentInput" class="mb-3">
                    <label for="document" class="form-label fw-bold">Upload File:</label>
                    <input type="file" class="form-control" id="document" name="document">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
