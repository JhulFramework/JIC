<?php namespace _modules\user\nodes\recovery\layout;


class Form extends \_m\webpage\sys\element\form\Form
{
	public function title()
	{
		return 'खाते का गुप्तशब्द पुनः प्राप्त करें';
	}

	public function description()
	{
		return 'आप जिस खाते का गुप्तशब्द भूल गए है उस खाते का ईमेल यहाँ लिखे, हम आपको उस ईमेल पर गुप्तशब्द पुनः स्थापित करने हेतु लिंक भेजेंगे';
	}
}
