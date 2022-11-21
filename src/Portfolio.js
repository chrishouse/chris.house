import axios from "axios";

class Portfolio {
  constructor() {
    this.portfolioCont = document.querySelector(".portfolio-grid");
    this.filterOptions = document.querySelectorAll(".filter-option");
    this.clearButton = document.querySelector(".clear-filter-button");

    this.selectedOptions = [];

    // These four variables are used to keep track of the current number of filters in a given category.
    this.countPlatform = 0;
    this.countRole = 0;
    this.countAssociation = 0;
    this.countBuildType = 0;

    this.fullResults = [];

    this.events();
    this.getResults();
  }

  events() {
    this.filterOptions.forEach(el => {
      el.addEventListener("click", e => this.newFilter(e));
    });
    this.clearButton.addEventListener("click", e => this.clearFilters(e));
  }

  async getResults() {
    try {
      const response = await axios.get(chData.root_url + "/wp-json/portfolio/v1/posts");

      this.fullResults = response.data;
      this.applyFilters();
    } catch (e) {
      console.log(e);
    }
  }

  clearFilters(e) {
    e.preventDefault();
    this.selectedOptions = [];
    this.countPlatform = 0;
    this.countRole = 0;
    this.countAssociation = 0;
    this.countBuildType = 0;
    this.filterOptions.forEach(el => {
      el.classList.remove("checked");
    });

    this.applyFilters();
  }

  newFilter(e) {
    // If item is NOT already checked, add 'checked' class and add its data-option value to the selectedOptions array
    // Otherwise, remove 'checked' class and drop its data-option value from the selectedOptions array

    let parentLi = e.target.closest(".filter-option");
    let dataCategory = parentLi.dataset.category;
    let dataOption = parentLi.dataset.option;

    if (parentLi.classList.contains("checked")) {
      parentLi.classList.remove("checked");
      let itemIndexToRemove = this.selectedOptions.indexOf(dataOption);
      this.selectedOptions.splice(itemIndexToRemove, 1);

      // Decrease the category count
      switch (dataCategory) {
        case "platform":
          this.countPlatform--;
          break;
        case "role":
          this.countRole--;
          break;
        case "association":
          this.countAssociation--;
          break;
        case "build_type":
          this.countBuildType--;
          break;
      }
    } else {
      parentLi.classList.add("checked");
      this.selectedOptions.push(dataOption);

      // Increment the category count
      switch (dataCategory) {
        case "platform":
          this.countPlatform++;
          break;
        case "role":
          this.countRole++;
          break;
        case "association":
          this.countAssociation++;
          break;
        case "build_type":
          this.countBuildType++;
          break;
      }
    }

    this.applyFilters();
  }

  applyFilters() {
    // This is where the categoryCount__ variables come in. Use them to check if that category should be included in the filter.
    // If 0, no items are filtered out for that category (i.e. all items are returned).
    // Each time the filter runs it modifies the new filteredResults array.

    let filteredResults = [];

    // Filter results by platform.
    filteredResults = this.fullResults.filter(item => {
      if (this.countPlatform > 0) {
        return this.selectedOptions.indexOf(item.platform) > -1;
      } else {
        return item;
      }
    });

    // Filter results by role.
    filteredResults = filteredResults.filter(item => {
      if (this.countRole > 0) {
        return this.selectedOptions.indexOf(item.role) > -1;
      } else {
        return item;
      }
    });

    // Filter results by association.
    filteredResults = filteredResults.filter(item => {
      if (this.countAssociation > 0) {
        return this.selectedOptions.indexOf(item.association) > -1;
      } else {
        return item;
      }
    });

    // Filter results by build_type.
    filteredResults = filteredResults.filter(item => {
      if (this.countBuildType > 0) {
        return this.selectedOptions.indexOf(item.build_type) > -1;
      } else {
        return item;
      }
    });

    // Output final results
    this.outputResults(filteredResults);
  }

  outputResults(filteredResults) {
    if (filteredResults.length > 0) {
      this.portfolioCont.innerHTML = filteredResults
        .map(
          item =>
            `<a href="${item.permalink}" data-id="${item.id}" class="portfolio-item">
                            <img src="${item.image}" alt="">
                            <p class="portfolio-item-title">${item.title}</p>
                        </a>`
        )
        .join("");
    } else {
      this.portfolioCont.innerHTML = "<p>There are no results for those filters.</p>";
    }
  }
}

export default Portfolio;
