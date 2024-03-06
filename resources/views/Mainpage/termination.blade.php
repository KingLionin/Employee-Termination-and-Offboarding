@extends('layouts.layout')

@section('title', 'Termination')

@section('content')

<div class="termination-card card mb-4">
    <div class="heading-and-search d-flex justify-content-between align-content-center">
        <h1 class="whr-termination-heading mt-3">Termination Table</h1>
        <input type="text" class="form-control terminate-search mt-3" id="terminationSearchInput"
            placeholder="Search" />
    </div>
    <hr class="border border-dark border-3 opacity-75" />
    <div class="card-body">

        <div id="terminationTableView" class="view-container table-responsive-md">
            <table class="table table-bordered table-hover tbl-termination t-4">
                <thead class="table-dark">
                    <tr>
                        <th>Employee ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="terminationTableBody">
                    
                </tbody>
            </table>
            <div id="terminationPaginationContainer" class="pagination-container text-center mt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- ... (other modal and script sections remain the same) -->

<script type="text/javascript">

    const terminationContentItems = document.querySelectorAll('.modal-content-item');
    let currentTerminationContentIndex = 0;

    function showTerminationInfo(action) {
        terminationContentItems[currentTerminationContentIndex].style.display = 'none';

        if (action === 'previous') {
            currentTerminationContentIndex = (currentTerminationContentIndex - 1 + terminationContentItems.length) % terminationContentItems.length;
        } else if (action === 'next') {
            currentTerminationContentIndex = (currentTerminationContentIndex + 1) % terminationContentItems.length;
        }

        terminationContentItems[currentTerminationContentIndex].style.display = 'block';
    }

    // Generate 200 sample entries for Termination
    const generateTerminationSampleData = () => {
        const data = [];
        for (let i = 1; i <= 500; i++) {
            data.push({
                terminationId: i,
                terminationLastName: `LastName${i}`,
                terminationFirstName: `FirstName${i}`,
                terminationMiddleName: `MiddleName${i}`,
                terminationGender: i % 2 === 0 ? 'Male' : 'Female',
                terminationEmail: `user${i}@example.com`,
            });
        }
        return data;
    };

    const terminationSampleData = generateTerminationSampleData();

    // Variables for Termination
    const terminationTableBody = document.getElementById('terminationTableBody');
    const terminationSearchInput = document.getElementById('terminationSearchInput');
    const terminationPaginationContainer = document.getElementById('terminationPaginationContainer');
    const terminationEntriesPerPage = 10;
    let terminationCurrentPage = 1;

    // Function to display Termination table data based on current page
    function displayTerminationTableData(filteredData) {
        terminationTableBody.innerHTML = ''; // Clear previous data

        if (filteredData.length === 0) {
            const noDataRow = document.createElement('tr');
            noDataRow.innerHTML = '<td colspan="7" class="text-center">No data recorded</td>';
            terminationTableBody.appendChild(noDataRow);
        } else {
            const startIndex = (terminationCurrentPage - 1) * terminationEntriesPerPage;
            const endIndex = startIndex + terminationEntriesPerPage;

            for (let i = startIndex; i < endIndex && i < filteredData.length; i++) {
                const employee = filteredData[i];
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${employee.terminationId}</td>
                    <td>${employee.terminationLastName}</td>
                    <td>${employee.terminationFirstName}</td>
                    <td>${employee.terminationMiddleName}</td>
                    <td>${employee.terminationGender}</td>
                    <td>${employee.terminationEmail}</td>
                    <td> 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newModal" onclick="openTerminationModal(${employee.terminationId})">
                            Terminate
                        </button>
                    </td>
                `;
                terminationTableBody.appendChild(row);
            }
        }
    }

    // Function to generate Termination pagination links
    function generateTerminationPagination(filteredData) {
        terminationPaginationContainer.innerHTML = ''; // Clear previous pagination

        const totalPages = Math.ceil(filteredData.length / terminationEntriesPerPage);

        if (totalPages > 1) {
            const ul = document.createElement('ul');
            ul.classList.add('pagination');

            // Previous button
            const previousLi = document.createElement('li');
            previousLi.classList.add('page-item');
            const previousLink = document.createElement('a');
            previousLink.classList.add('page-link');
            previousLink.setAttribute('href', '#');
            previousLink.setAttribute('aria-label', 'Previous');
            previousLink.innerHTML = '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span>';
            previousLi.appendChild(previousLink);
            ul.appendChild(previousLi);

            // Generate up to 5 pages initially
            for (let i = 1; i <= Math.min(5, totalPages); i++) {
                const li = document.createElement('li');
                li.classList.add('page-item');
                const link = document.createElement('a');
                link.classList.add('page-link');
                link.setAttribute('href', '#');
                link.textContent = i;
                li.appendChild(link);
                ul.appendChild(li);

                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    terminationCurrentPage = i;
                    displayTerminationTableData(filteredData);
                });
            }

            // Ellipsis if there are more than 5 pages
            if (totalPages > 5) {
                const ellipsisLi = document.createElement('li');
                ellipsisLi.classList.add('page-item');
                ellipsisLi.innerHTML = '<span class="page-link">...</span>';
                ul.appendChild(ellipsisLi);
            }

            // Display the last 5 pages or all pages if total pages are less than 5
            const startPage = Math.max(1, totalPages - 4);
            const endPage = totalPages;

            for (let i = startPage; i <= endPage; i++) {
                const li = document.createElement('li');
                li.classList.add('page-item');
                const link = document.createElement('a');
                link.classList.add('page-link');
                link.setAttribute('href', '#');
                link.textContent = i;
                li.appendChild(link);
                ul.appendChild(li);

                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    terminationCurrentPage = i;
                    displayTerminationTableData(filteredData);
                });
            }

            // Next button
            const nextLi = document.createElement('li');
            nextLi.classList.add('page-item');
            const nextLink = document.createElement('a');
            nextLink.classList.add('page-link');
            nextLink.setAttribute('href', '#');
            nextLink.setAttribute('aria-label', 'Next');
            nextLink.innerHTML = '<span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span>';
            nextLi.appendChild(nextLink);
            ul.appendChild(nextLi);

            terminationPaginationContainer.appendChild(ul);

            // Event listener for Previous button
            previousLink.addEventListener('click', (event) => {
                event.preventDefault();
                if (terminationCurrentPage > 1) {
                    terminationCurrentPage--;
                    displayTerminationTableData(filteredData);
                }
            });

            // Event listener for Next button
            nextLink.addEventListener('click', (event) => {
                event.preventDefault();
                if (terminationCurrentPage < totalPages) {
                    terminationCurrentPage++;
                } else {
                    // If the current page is the last page, update displayed pages dynamically
                    const startPage = Math.max(1, totalPages - 4);
                    const endPage = totalPages;

                    for (let i = startPage; i <= endPage; i++) {
                        const li = document.createElement('li');
                        li.classList.add('page-item');
                        const link = document.createElement('a');
                        link.classList.add('page-link');
                        link.setAttribute('href', '#');
                        link.textContent = i;
                        li.appendChild(link);
                        ul.appendChild(li);

                        link.addEventListener('click', (event) => {
                            event.preventDefault();
                            terminationCurrentPage = i;
                            displayTerminationTableData(filteredData);
                        });
                    }
                }
                displayTerminationTableData(filteredData);
            });
        }
    }

    // Initial setup to display Termination table with all data
    displayTerminationTableData(terminationSampleData);
    generateTerminationPagination(terminationSampleData);

    // Event listener for Termination search input changes
    terminationSearchInput.addEventListener('input', () => {
        terminationCurrentPage = 1; // Reset to the first page when searching
        const terminationSearchTerm = terminationSearchInput.value.toLowerCase().trim();

        const filteredData = terminationSampleData.filter(employee =>
            Object.values(employee)
                .map(value => String(value).toLowerCase())
                .join(' ')
                .includes(terminationSearchTerm)
        );

        displayTerminationTableData(filteredData);
        generateTerminationPagination(filteredData);
    });
</script>

@push('scripts')

@endpush

@endsection