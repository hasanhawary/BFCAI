<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{

    public function run()
    {
        /******* Start Test Send Message From Sudetns to Doctors *******/
        Message::create([
            'subject' => 'This Is Test subject From Student',
            'content' =>
            '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'instructors',
            'receive_user_id' => 1,
            'send_user' => 'students',
            'send_user_id' => 1,
        ]);
        Message::create([
            'subject' => 'This Is Test subject From Student',
            'content' =>
            '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'instructors',
            'receive_user_id' => 1,
            'send_user' => 'students',
            'send_user_id' => 2,
        ]);
        Message::create([
            'subject' => 'This Is Test subject From Student',
            'content' =>
            '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'instructors',
            'receive_user_id' => 1,
            'send_user' => 'students',
            'send_user_id' => 3,
        ]);
        /******* End Test Send Message From Sudetns to Doctors *******/

        /******* Start Send Message From Sudetns to Assistant *******/
        Message::create([
            'subject' => 'This Is Test subject From Student',
            'content' =>
            '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'instructors',
            'receive_user_id' => 2,
            'send_user' => 'students',
            'send_user_id' => 1,
        ]);
        Message::create([
            'subject' => 'This Is Test subject From Student',
            'content' =>
            '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'instructors',
            'receive_user_id' => 2,
            'send_user' => 'students',
            'send_user_id' => 2,
        ]);
        Message::create([
            'subject' => 'This Is Test subject From Student',
            'content' =>
            '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'instructors',
            'receive_user_id' => 2,
            'send_user' => 'students',
            'send_user_id' => 3,
        ]);
        /******* End Send Message From Sudetns to Assistant *******/

        /******* Start Send Message From instructors to students *******/
        Message::create([
            'subject' => 'This Is Test subject From Instructors',
            'content' => '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'students',
            'receive_user_id' => 1,
            'send_user' => 'instructors',
            'send_user_id' => 1,
        ]);
        Message::create([
            'subject' => 'This Is Test subject From Instructors',
            'content' => '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'students',
            'receive_user_id' => 2,
            'send_user' => 'instructors',
            'send_user_id' => 1,
        ]);
        Message::create([
            'subject' => 'This Is Test subject From Instructors',
            'content' => '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'students',
            'receive_user_id' => 3,
            'send_user' => 'instructors',
            'send_user_id' => 1,
        ]);
        Message::create([
            'subject' => 'This Is Test subject From Instructors',
            'content' => '<p><strong>Hello John,</strong></p>
                          <p>Post-ironic shabby chic VHS, Marfa keytar flannel lomo try-hard keffiyeh cray. Actually fap fanny pack yr artisan trust fund. High Life dreamcatcher church-key gentrify. Tumblr stumptown four dollar toast vinyl, cold-pressed try-hard blog authentic keffiyeh Helvetica lo-fi tilde Intelligentsia. Lomo locavore salvia bespoke, twee fixie paleo cliche brunch Schlitz blog McSweeney&#39;s messenger bag swag slow-carb. Odd Future photo booth pork belly, you probably haven&#39;t heard of them actually tofu ennui keffiyeh lo-fi Truffaut health goth. Narwhal sustainable retro disrupt.</p>
                          <p>Skateboard artisan letterpress before they sold out High Life messenger bag. Bitters chambray leggings listicle, drinking vinegar chillwave synth. Fanny pack hoodie American Apparel twee. American Apparel PBR listicle, salvia aesthetic occupy sustainable Neutra kogi. Organic synth Tumblr viral plaid, shabby chic single-origin coffee Etsy 3 wolf moon slow-carb Schlitz roof party tousled squid vinyl. Readymade next level literally trust fund. Distillery master cleanse migas, Vice sriracha flannel chambray chia cronut.</p>
                          <p><strong>Thanks,<br /> Hassan</strong></p>',
            'receive_user' => 'students',
            'receive_user_id' => 1,
            'send_user' => 'instructors',
            'send_user_id' => 2,
        ]);
        /******* End Send Message From instructors to students *******/
    }
}
