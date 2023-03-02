<h1 align="center">CoCart - Sync Carts</h1>

<p align="center"><img src="https://cocart.xyz/wp-content/uploads/2021/11/cocart-home-default.png.webp" alt="CoCart Logo" /></p>

<br>

## Description

Used to keep track of cart changes made to a previously loaded cart (using "Load Cart from Session") when passing a guest cart to a logged in customer.

It allows for the customer to keep the same cart in two different states.

Let me explain. Your user (customer) started shopping as a guest via the decoupled site but was then redirected to the main site that is running the store where the cart was loaded, but your user was logged in there which transfers over the cart session to their user ID.

Now the main site that the user is logged in as is controlling the cart. The cart the user had before as a guest is no longer keeping track of changes made to the cart.

This plugin is designed to do just that. It logs the cart key of the session that was loaded and updates the cart data for that session once the main session in control has completed it's actions.

Now both carts for your customer, guest or logged in are a match.

That's it.

## Requirements

You will need CoCart v3.8.0 or above for this plugin to work.

## Support

This is currently an **experimental feature plugin** and may change over time before being added to **CoCart Pro** but is in no way supported at this time.

Use at your own risk and provide feedback if you can but don't expect an immediate response if you are experiencing any issues.

If you find this feature plugin helped you, please show some support by [purchasing CoCart Pro](https://cocart.xyz/pro/).

Thank you.

## License

Released under [GNU General Public License v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

---

## CoCart Channels

We have different channels at your disposal where you can find information about the CoCart project, discuss it and get involved:

[![Twitter: cocartapi](https://img.shields.io/twitter/follow/cocartapi?style=social)](https://twitter.com/cocartapi) [![CoCart GitHub Stars](https://img.shields.io/github/stars/co-cart/co-cart?style=social)](https://github.com/co-cart/co-cart)

<ul>
  <li>📖 <strong>Docs</strong>: this is the place to learn how to use CoCart API. <a href="https://docs.cocart.xyz/#getting-started">Get started!</a></li>
  <li>🧰 <strong>Resources</strong>: this is the hub of all CoCart resources to help you build a headless store. <a href="https://cocart.dev/?utm_medium=gh&utm_source=github&utm_campaign=readme&utm_content=cocart">Get resources!</a></li>
  <li>👪 <strong>Community</strong>: use our Slack chat room to share any doubts, feedback and meet great people. This is your place too to share <a href="https://cocart.xyz/community/?utm_medium=gh&utm_source=github&utm_campaign=readme&utm_content=cocart">how are you planning to use CoCart!</a></li>
  <li>🐞 <strong>GitHub</strong>: we use GitHub for bugs and pull requests, doubts are solved with the community.</li>
  <li>🐦 <strong>Social media</strong>: a more informal place to interact with CoCart users, reach out to us on <a href="https://twitter.com/cocartapi">Twitter.</a></li>
  <li>💌 <strong>Newsletter</strong>: do you want to receive the latest plugin updates and news? Subscribe <a href="https://twitter.com/cocartapi">here.</a></li>
</ul>

---

## Credits

CoCart - Sync Carts is developed and maintained by [Sébastien Dumont](https://github.com/seb86).

Founder of CoCart - [Sébastien Dumont](https://github.com/seb86).

---

Website [sebastiendumont.com](https://sebastiendumont.com) &nbsp;&middot;&nbsp;
GitHub [@seb86](https://github.com/seb86) &nbsp;&middot;&nbsp;
Twitter [@sebd86](https://twitter.com/sebd86)

<p align="center">
    <img src="https://raw.githubusercontent.com/seb86/my-open-source-readme-template/master/a-sebastien-dumont-production.png" width="353">
</p>