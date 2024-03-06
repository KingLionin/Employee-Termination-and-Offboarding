@extends('layouts.layout')

@section('title', 'Offboarding')

@section('content')

<div class="offboarding-card card mb-4">
  <div class="heading-and-search d-flex justify-content-between align-content-center">
    <h1 class="whr-offboarding-heading mt-3">Offboarding Table</h1>
    <input type="text" class="form-control mt-3" id="offboardingSearchInput" placeholder="Search" />
  </div>
  <hr class="border border-dark border-3 opacity-75" />
  <div class="card-body">

    <div id="offboardingTableView" class="view-container table-responsive-md">
      <table class="table table-bordered table-hover tbl-offboarding t-4">
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
        <tbody id="offboardingTableBody">
          <!-- Table Body Content Will be Populated Dynamically -->
        </tbody>
      </table>
      <div id="offboardingPaginationContainer" class="pagination-container text-center mt-3">
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

<div class="modal fade" id="offboardingModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Employee Information</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body" id="offboardingDynamicContent">
        <div id="offboardingEmployee-info-content" class="modal-content-item">
          <h2>Employee Information</h2>
        </div>
        <div id="offboardingTime-attendance-content" class="modal-content-item" style="display: none;">
          <h2>Time and Attendance</h2>
        </div>
        <div id="offboardingPerformance-content" class="modal-content-item" style="display: none;">
          <h2>Employee Performance</h2>
        </div>
        <div id="offboardingBenefits-content" class="modal-content-item" style="display: none;">
          <h2>Employee Benefits</h2>
        </div>
        <div id="offboardingLeave-content" class="modal-content-item" style="display: none;">
          <h2>Employee Leave</h2>
        </div>
        <!-- Add other content divs here -->
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary" onclick="showOffboardingInfo('previous')">Previous</button>
        <button type="button" class="btn btn-primary" onclick="requestOffboardingApproval()">Request
          Offboarding</button>
        <button type="button" class="btn btn-secondary" onclick="showOffboardingInfo('next')">Next</button>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">

  const offboardingContentItems = document.querySelectorAll('.modal-content-item');
  let currentOffboardingContentIndex = 0;

  function showOffboardingInfo(action) {
    offboardingContentItems[currentOffboardingContentIndex].style.display = 'none';

    if (action === 'previous') {
      currentOffboardingContentIndex = (currentOffboardingContentIndex - 1 + offboardingContentItems.length) % offboardingContentItems.length;
    } else if (action === 'next') {
      currentOffboardingContentIndex = (currentOffboardingContentIndex + 1) % offboardingContentItems.length;
    }

    offboardingContentItems[currentOffboardingContentIndex].style.display = 'block';
  }

  // Generate 200 sample entries
  const generateOffboardingSampleData = () => {
    const data = [];
    for (let i = 1; i <= 500; i++) {
      data.push({
        offboardingId: i,
        offboardingLastName: `LastName${i}`,
        offboardingFirstName: `FirstName${i}`,
        offboardingMiddleName: `MiddleName${i}`,
        offboardingGender: i % 2 === 0 ? 'Male' : 'Female',
        offboardingEmail: `user${i}@example.com`,
      });
    }
    return data;
  };

  const offboardingSampleData = generateOffboardingSampleData();

  // Variables
  const offboardingTableBody = document.getElementById('offboardingTableBody');
  const offboardingSearchInput = document.getElementById('offboardingSearchInput');
  const offboardingPaginationContainer = document.getElementById('offboardingPaginationContainer');
  const offboardingEntriesPerPage = 10;
  let offboardingCurrentPage = 1;

  // Function to display table data based on current page
  function displayOffboardingTableData(filteredData) {
    offboardingTableBody.innerHTML = ''; // Clear previous data

    if (filteredData.length === 0) {
      const noDataRow = document.createElement('tr');
      noDataRow.innerHTML = '<td colspan="7" class="text-center">No data recorded</td>';
      offboardingTableBody.appendChild(noDataRow);
    } else {
      const startIndex = (offboardingCurrentPage - 1) * offboardingEntriesPerPage;
      const endIndex = startIndex + offboardingEntriesPerPage;

      for (let i = startIndex; i < endIndex && i < filteredData.length; i++) {
        const employee = filteredData[i];
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${employee.offboardingId}</td>
          <td>${employee.offboardingLastName}</td>
          <td>${employee.offboardingFirstName}</td>
          <td>${employee.offboardingMiddleName}</td>
          <td>${employee.offboardingGender}</td>
          <td>${employee.offboardingEmail}</td>
          <td> 
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#offboardingModal" onclick="openOffboardingModal(${employee.offboardingId})">
              Offboard
            </button >
          </td >
        `;
        offboardingTableBody.appendChild(row);
      }
    }
  }

  // Function to generate pagination links
  function generateOffboardingPagination(filteredData) {
    offboardingPaginationContainer.innerHTML = ''; // Clear previous pagination

    const totalPages = Math.ceil(filteredData.length / offboardingEntriesPerPage);

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
          offboardingCurrentPage = i;
          displayOffboardingTableData(filteredData);
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
          offboardingCurrentPage = i;
          displayOffboardingTableData(filteredData);
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

      offboardingPaginationContainer.appendChild(ul);

      // Event listener for Previous button
      previousLink.addEventListener('click', (event) => {
        event.preventDefault();
        if (offboardingCurrentPage > 1) {
          offboardingCurrentPage--;
          displayOffboardingTableData(filteredData);
        }
      });

      // Event listener for Next button
      nextLink.addEventListener('click', (event) => {
        event.preventDefault();
        if (offboardingCurrentPage < totalPages) {
          offboardingCurrentPage++;
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
              offboardingCurrentPage = i;
              displayOffboardingTableData(filteredData);
            });
          }
        }
        displayOffboardingTableData(filteredData);
      });
    }
  }


  // Initial setup to display table with all data
  displayOffboardingTableData(offboardingSampleData);
  generateOffboardingPagination(offboardingSampleData);

  // Event listener for input changes
  offboardingSearchInput.addEventListener('input', () => {
    offboardingCurrentPage = 1; // Reset to the first page when searching
    const offboardingSearchTerm = offboardingSearchInput.value.toLowerCase().trim();

    const filteredData = offboardingSampleData.filter(employee =>
      Object.values(employee)
        .map(value => String(value).toLowerCase())
        .join(' ')
        .includes(offboardingSearchTerm)
    );

    displayOffboardingTableData(filteredData);
    generateOffboardingPagination(filteredData);
  });
</script>

@push('scripts')

@endpush

@endsection