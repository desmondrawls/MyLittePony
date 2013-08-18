class Texter

  def self.send_with_twilio(content)
    Twilio::SMS.create :to => "+12069725447", 
    :from => ENV["TWILIO_NUMBER"],
    :body => content
  end

end