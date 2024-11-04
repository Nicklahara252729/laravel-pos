const listingOutlet = 'https://mocki.io/v1/85c9ef1e-ce08-475b-b1f5-917cda01d235';
const listingDashboard = 'https://mocki.io/v1/97d91318-54b5-41d2-9196-c9a86ff8fcfe';
const riwayatTransaksiTotalData = 'https://mocki.io/v1/db226034-3ab5-496f-8637-1ddc1402c7ec';
const riwayatTransaksiTransactionData = 'https://mocki.io/v1/d4c6439d-08bf-409a-90d5-5c97f3cbfd9e';
const listingModifier = 'https://mocki.io/v1/843a3f86-b441-4906-8b43-6bd35bd8bdb6';
const listingRecipe = 'https://mocki.io/v1/2398005b-b0b5-4abe-838c-2d07dc8dac28';
const getDiscountById = 'https://mocki.io/v1/d4f273b8-d94b-4185-8a06-8a1ffa576d5f';
const listingDiscount = 'https://testapi.io/api/fahrurrozy4213/get_discount';
const singleCategoryProduct = 'https://mocki.io/v1/2278e4c9-0f6e-4004-a9b1-f08998427421';
const listingProduct = 'https://mocki.io/v1/5998a089-a0c0-4860-8052-e9c605192b47';
const listingGratuity = 'https://mocki.io/v1/6899779d-b362-44ad-b241-16fcd3370227';
const listingCustomer = (dataLimit, currentPage, searchInput) => {
  return `https://mocki.io/v1/5f479105-5a6c-4c60-a888-192365e3290d?dataLimit=${dataLimit}&currentPage=${currentPage}${
    searchInput ? `&search=${searchInput}` : ''
  }`;
};
const getCustomerById = `https://testapi.io/api/fahrurrozy4213/get_customer_by_id`;
const getCustomerByIdSecUrl = (customerId) => {
  return `https://mocki.io/v1/d002c076-ad99-4564-ae32-d60efcd3c40b/${customerId}`;
};
const listingRole = 'https://mocki.io/v1/7e9ce497-8d7f-4f4a-8069-e487b72e30fb';
const listingOutlet2 = 'https://mocki.io/v1/178cc2e2-fb14-4b39-8005-6afb418e3e66';
const listingHakAkses = 'https://mocki.io/v1/2c6f1091-a7de-4ce2-92bc-69f1ea7061c9';
const receipt = 'https://mocki.io/v1/b5e4c6eb-952e-4ad0-b019-e13c1cf0aa6f';