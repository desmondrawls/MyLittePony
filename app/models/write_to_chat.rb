class WriteToChat
  def self.push_message(content)
    uri = URI.parse("http://localhost:9292/faye")
    data = {:content => content}
    message = {:channel => "/receive", :data => data}
    Net::HTTP.post_form(uri, :message => message.to_json)
  end
end