class Texter
  @@family = ["ME"]
  def self.send_with_twilio(speaker, content)
    body = speaker + ": " + content
    @@family.each do |family_member|
      Twilio::SMS.create :to => ENV[family_member], 
      :from => ENV["TWILIO_NUMBER"],
      :body => body
    end
  end

  def self.send_better_luck(sender)
    Twilio::SMS.create :to => sender, 
    :from => ENV["TWILIO_NUMBER"],
    :body => "Faster thumbs next time..."
  end

  def self.update(message)
    @@family.each do |family_member|
      Twilio::SMS.create :to => ENV[family_member],
      :from => ENV["TWILIO_NUMBER"],
      :body => "a mysterious pony responds: #{message.content}"
    end 
  end

  def self.correction(sender)
    Twilio::SMS.create :to => sender,
    :from => ENV["TWILIO_NUMBER"],
    :body => "The proper format is 
    'PONY_NAME: YOUR_MESSAGE'. 
    PONY_NAME should match the name on the last message you received from everfree."
  end

end