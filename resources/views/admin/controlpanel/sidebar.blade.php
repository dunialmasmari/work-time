<input type="checkbox" id="sidebar-toggle">
    <div class="sidebar">
      <div class="sidebar-header">
        <h5 class="brand">
          <i  class="bi bi-circle-fill"></i>
          <span>work Time</span>
        </h5> 
        <!-- bi-chevron-right-->
        <label for="sidebar-toggle" class="bi bi-list"></label>
      </div>
      <hr>
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="{{ url('/controlpanel') }}">
            <i class="material-icons">assignment</i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/major') }}">
              <i class="bi bi-diagram-2"></i>
              <span>major</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/tender') }}">
              <i class="bi bi-markdown"></i>
              <span>Tender</span>
            </a>
          </li>
        </ul>
      </div>
    </div>