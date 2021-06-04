# Security Policy

Safety is one of the core principles of scorpion, and to that end, we would like to ensure that scorpion has a secure implementation. Thank you for taking the time to responsibly disclose any issues you find.

## Reporting

All security bugs in scorpion related projects should be reported by opening a draft security advisory through the GitHub repository.You will recieve a GHSA-### ticket. We ask that you also send an email to <security@scorpion.io> with the GHSA number attached. This list is delivered to a small security team. Your email will be acknowledged within 24 hours, and you’ll receive a more detailed response to your email within 48 hours indicating the next steps in handling your report. If you would like, you can encrypt your report using our public key. This key is also On MIT’s keyserver and reproduced below.

> This email address receives a large amount of spam, so be sure to use a descriptive subject line to avoid having your report be missed. After the initial reply to your report, the security team will endeavor to keep you informed of the progress being made towards a fix and full announcement. As recommended by RFPolicy, these updates will be sent at least every five days. In reality, this is more likely to be every 24-48 hours.

If you have not received a reply to your email within 48 hours, or have not heard from the security team for the past five days, there are a few steps you can take (in order):

1. Contact the current security coordinator
   - **Brett Wilcox:** <brett@scopion.io> - [public key](https://gist.githubusercontent.com/brettwilcox/195560f183d04e329f1b1d8631366a3f/raw/cb3e4b2d2f8a4fdf483d21497cb00ef381597b15/public_key.asc).
2. Post on the internal issue tracker
3. Please note that the issue trackers are public areas. When escalating in these venues, please do not discuss your issue. Simply say that you’re trying to get a hold of someone from the security team.

## Disclosure policy

_The scorpion project has a 5 step disclosure process._

1. The security report is received and is assigned a primary handler. This person will coordinate the fix and release process.
2. The problem is confirmed and a list of all affected versions is determined.
3. Code is audited to find any potential similar problems.
4. Fixes are prepared for all releases which are still under maintenance. These fixes are not committed to the public repository but rather held locally pending the announcement.
5. On the embargo date, the scorpion GitHub Security Advisories is sent a copy of the announcement. The changes are pushed to the public repository and new builds are deployed to scorpion.io. Within 6 hours of the mailing list being notified, a copy of the advisory will be published on the scorpion blog.

This process can take some time, especially when coordination is required with maintainers of other projects. Every effort will be made to handle the bug in as timely a manner as possible, however _it’s important that we follow the release process above to ensure that the disclosure is handled in a consistent manner_.

## Plaintext PGP key

🔑 GPG Fingerprint: A8F3 C9C5 5305 F600 ED29  97EC `2899 2802 AE46 E32D`

```
-----BEGIN PGP PUBLIC KEY BLOCK-----

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
3JXjyCfgmfS4iMJp
=S+3R
-----END PGP PUBLIC KEY BLOCK-----
```
