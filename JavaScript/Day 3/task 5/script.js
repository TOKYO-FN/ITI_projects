function openAdWindow() {
  const adContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Advertisement</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                        }
                        .ad-content {
                            width: 100%;
                            height: 100%;
                            overflow: auto;
                        }
                    </style>
                </head>
                <body>
                    <div class="ad-content">
                        <h1>Special Offer!</h1>
                        <p>Don't miss out on our amazing deals.</p>
                        <p>Save up to 50% on select items!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus interdum sodales. Quisque quis odio dui. Duis sit amet elit ut libero lobortis sollicitudin. Suspendisse potenti. Proin facilisis lectus vel nisl consectetur, vel consequat dui tincidunt. Nunc tincidunt nisl ipsum, nec venenatis libero. Curabitur ac placerat felis, non bibendum arcu. Nullam at risus metus. Nam consectetur risus et mi pulvinar, in viverra ligula ultricies. Nulla facilisi. Sed ut venenatis erat, nec pulvinar elit.</p>
                        <p>Curabitur venenatis leo sit amet justo pretium, ut congue sapien venenatis. Ut feugiat mattis est, sed vehicula libero. In eu lacus in odio condimentum auctor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec varius justo at enim molestie, sed auctor arcu sagittis. Aenean quis turpis quis libero interdum fermentum. Proin dapibus nulla nec orci euismod, non ultricies metus convallis. Nullam ullamcorper nulla ut velit egestas, vel fermentum dui blandit. Cras varius, ex eu sagittis scelerisque, ipsum tortor luctus est, eu dignissim nisi libero ac felis.</p>
                        <p>Phasellus auctor orci non dui posuere, sit amet euismod lectus molestie. Nam vel justo sapien. Nam vestibulum, odio nec interdum porttitor, dolor libero efficitur justo, nec efficitur nisl ligula id nunc. Aliquam erat volutpat. Vestibulum vel nisl ut nisl commodo pellentesque. In sit amet sapien urna. Donec mollis neque quis venenatis ullamcorper. Proin venenatis feugiat eros non pretium. Donec viverra nisi ligula, sit amet faucibus dolor tempus sit amet.</p>
                        <p>Sed facilisis, orci eget dapibus pretium, est velit pharetra urna, a finibus metus eros in ante. Integer vitae augue sed orci ultrices varius. Fusce euismod leo ac elit interdum, ac gravida velit laoreet. Sed ac lorem at libero dapibus suscipit a in libero. Donec rutrum, magna eget fermentum fermentum, lorem velit dictum dolor, a placerat arcu nulla id felis. Nulla iaculis eu nisl ut gravida. Vestibulum posuere, nisl vel cursus varius, elit elit tempor sapien, nec malesuada arcu ex ac velit.</p>
                        <p>Thank you for checking out our special offers!</p>
                    </div>
                </body>
                </html>
            `;

  const adWindow = window.open(
    "",
    "AdWindow",
    "width=600,height=400,scrollbars=yes,resizable=no"
  );
  adWindow.document.write(adContent);
}
