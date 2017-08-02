import { BootcampPage } from './app.po';

describe('bootcamp App', () => {
  let page: BootcampPage;

  beforeEach(() => {
    page = new BootcampPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!');
  });
});
